<!DOCTYPE html>
<?php
include("./lib/session.php");
include('lib/connect.php'); ?>
<html lang="en">

<head>
    <?php include('inc/metatag.php'); ?>
    <?php include('inc/loadstyle.php'); ?>
    <?php include('inc/loadscript.php'); // ต้องมี jQuery 
    ?>
    <style>
        #messages {
            display: flex;
            flex-direction: column;
            align-items: center;
            /* ✅ center horizontally */
        }

        .msg {
            max-width: 70%;
            padding: 10px 14px;
            margin: 6px 0;
            border-radius: 12px;
            background: #e6e6e6;
        }

        .user {
            background: #d0e7ff;
            /* blue-ish */
        }

        .assistant {
            background: #d6f5d6;
            /* green-ish */
        }


        form {
            margin-top: 12px;
            display: flex;
            gap: 8px;
            justify-content: center;
            /* centers input + button */
        }

        input[type="text"] {
            flex: 1;
            padding: 10px 14px;
            font-size: 16px;
            border: 2px solid #4facfe;
            border-radius: 8px;
            outline: none;
            transition: all 0.3s ease;
        }

        input[type="text"]:focus {
            border-color: #00c6ff;
            box-shadow: 0 0 8px rgba(0, 198, 255, 0.5);
        }

        button {
            padding: 10px 18px;
            font-size: 16px;
            font-weight: bold;
            border: none;
            border-radius: 8px;
            background: linear-gradient(135deg, #4facfe, #00f2fe);
            color: white;
            cursor: pointer;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        button:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(79, 172, 254, 0.4);
        }

        button:active {
            transform: translateY(0);
            box-shadow: 0 2px 6px rgba(79, 172, 254, 0.3);
        }
    </style>
</head>

<body>
    <div class="global-container">
        <?php include('inc/header.php'); ?>

        <section class="layout-container ">
            <div class="default-header">
                <div class="wrapper">
                    <div class="container">
                        <div class="title text-center">วิเคราะห์โรค</div>
                        <div class="text-center txt-desc" style="color: white;line-height: 1.5rem;"></div>
                    </div>
                </div>
                <figure class="cover">
                    <img class="img-cover" src="<?php echo $core_template; ?>assets/img/background/bg-home.png" alt="bg-home">
                </figure>
            </div>

            <div class="student-page" style="margin: 6rem 0;">
                <div class="information-system">
                    <div class="container-xl">

                        <div class="row py-2">
                                <div class="col text-center">
                                    <i class="fa fa-paw" style="color: #867070;font-size:5rem;" aria-hidden="true"></i>
                                    <br>
                                    <br>
                                    ใส่รายละเอียดอาการเพื่อให้ ai เพื่อวิเคราะห์โรคสัตว์เลี้ยงเบื้องต้น
                                </div>
                            </div>

                        <div id="messages"></div>

                        <form id="chatForm">
                            <input id="prompt" type="text" placeholder="Say something..." autocomplete="off" />
                            <button type="submit">ส่ง</button>
                        </form>

                    </div>
                </div>

            </div>
        </section>

        <?php include('inc/footer.php'); ?>
    </div>

    <script>
        function StepValue() {
            var TYPE = "POST";
            var URL = "./analysis-select.php";

            var new_value = document.querySelector('input[name="question"]:checked').value;
            var id = document.getElementById("id").value || "";

            jQuery.ajax({
                type: TYPE,
                url: URL,
                data: {
                    new_value: new_value,
                    id: id
                },
                success: function(html) {
                    jQuery("#questionans").html(html);
                    // หมายเหตุ: ฝั่ง PHP จะส่ง hidden#id ตัวใหม่กลับมาเองในรอบถัดไป
                },
                error: function(xhr) {
                    alert("เกิดข้อผิดพลาด: " + (xhr.status || "") + " " + (xhr.statusText || ""));
                }
            });
        }

        const messagesEl = document.getElementById('messages');
        const form = document.getElementById('chatForm');
        const promptInput = document.getElementById('prompt');

        // Keep conversation in an array so we can send full context
        const conversation = [{
            role: "system",
            content: "You are a helpful assistant."
        }];

        function append(role, text) {
            const div = document.createElement('div');
            div.className = 'msg ' + (role === 'user' ? 'user' : 'assistant');
            div.textContent = (role === 'user' ? 'You: ' : 'Bot: ') + text;
            messagesEl.appendChild(div);
            messagesEl.scrollTop = messagesEl.scrollHeight;
        }

        form.addEventListener('submit', async (e) => {
            e.preventDefault();
            const text = promptInput.value.trim();
            if (!text) return;
            append('user', text);
            conversation.push({
                role: 'user',
                content: text
            });
            promptInput.value = '';
            append('assistant', '...thinking');

            // send conversation to PHP
            try {
                const res = await fetch('chat.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        messages: conversation
                    })
                });
                const data = await res.json();
                // remove the temporary thinking message
                messagesEl.lastElementChild.remove();

                if (data.error) {
                    append('assistant', 'Error: ' + data.error);
                } else {
                    const assistantText = data.reply;
                    append('assistant', assistantText);
                    // add assistant reply into conversation context
                    conversation.push({
                        role: 'assistant',
                        content: assistantText
                    });
                }
            } catch (err) {
                // remove thinking and show error
                messagesEl.lastElementChild.remove();
                append('assistant', 'Request failed: ' + err.message);
            }
        });
    </script>
</body>

</html>
<!-- เริ่มต้นกระบวนการวิเคราะห์โรค โดยให้ผู้ใช้เลือกประเภทสัตว์เลี้ยงก่อน จากนั้นจะดำเนินการถามอาการทีละข้อผ่าน AJAX ไปยังไฟล์ analysis-select.php เพื่อวิเคราะห์โรคต่อไป -->