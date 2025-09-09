<? if ($pagination){ ?>
<div class="pagination-block">
    <div class="pagination">
        <ul class="item-list">
            <? $pageStartShow = $pagination['curent'] - 2 ?>
            <? $pageEndShow = $pagination['curent'] + 2 ?>

            <? if ($pageStartShow < 1) {
                $pageStartShow = 1;
            } ?>


            <? if ($pageStartShow - 2 < 0) {
                $pageEndShow = $pageEndShow + (2 + ($pageStartShow - $pagination['current']));
            }
            ?>


            <? if ($pageEndShow >= $pagination['totalpage']) {
                $pageEndShow = $pagination['totalpage'];
            }
            ?>

            <? if (($pagination['total'] - $pagination['curent']) < 2) {
                $startAdd = 2 - ($pagination['totalpage'] - $pagination['curent']);
                $pageStartShow = $pageStartShow - $startAdd;
            }
            ?>

            <?
            if ($pageStartShow < 1) {
                $pageStartShow = 1;
            }
            if ($pagination['curent'] > 2) { ?>
                <li class="first-page">
                    <a href="{$ul}{$pagination.method.page}{$pagination.method.parambefor}{$pagination.method.parameter}1" class="link"><span class="material-symbols-rounded">
                            keyboard_double_arrow_left
                        </span></a>
                </li>
            <? } ?>

            <? if (($pagination['curent'] - 1) > 0) {
            ?>
                <li class="prev-page">
                    <a href="{$ul}{$pagination.method.page}{$pagination.method.parambefor}{$pagination.method.parameter}{$pagination.curent-1}" class="link"><span class="material-symbols-rounded">
                            chevron_left
                        </span></a>
                </li>
            <? } ?>

            <? for ($current = $pageStartShow; $current <= $pageEndShow; $current++) { ?>
                <li class="{if $current == $pagination.curent}active{/if}">
                    <a href="{$ul}{$pagination.method.page}{$pagination.method.parambefor}{$pagination.method.parameter}{$current}" class="link">{{$current}}</a>
                </li>
            <? } ?>

            <? if (($pagination['curent'] + 1) <= $pagination['totalpage']) { ?> <li class="next-page">
                    <a href="{$ul}{$pagination.method.page}{$pagination.method.parambefor}{$pagination.method.parameter}{$pagination.curent+1}" class="link"><span class="material-symbols-rounded">
                            chevron_right
                        </span></a>
                </li>
            <? } ?>
            <?if(($pagination['curent']+1) < $pagination['totalpage']){ ?> <li class="last-page">
                <a href="{$ul}{$pagination.method.page}{$pagination.method.parambefor}{$pagination.method.parameter}{$pagination.totalpage}" class="link"><span class="material-symbols-rounded">
                        keyboard_double_arrow_right
                    </span></a>
                </li>
            <? } ?>


        </ul>
    </div>
</div>
<? } ?>