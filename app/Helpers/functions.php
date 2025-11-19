<?php

use Illuminate\Support\Facades\DB;

if (! function_exists('selected')) {
    /**
     * echo attribute 'selected'
     *
     * @param  mixed  $default
     * @param  mixed   $current
     * @return string
     */
    function selected($default, $current): string
    {
        return $default == $current ? 'selected':'';
    }
}

if (! function_exists('selectedOld')) {
    /**
     * echo attribute 'selected'
     *
     * @param  mixed  $default
     * @param  mixed   $current
     * @return string
     */
    function selectedOld($key, $current = '', $default = ''): string
    {
        return old($key, $default) == $current ? 'selected':'';
    }
}

if (! function_exists('checked')) {
    /**
     * echo attribute 'checked'
     *
     * @param  mixed  $default
     * @param  mixed   $current
     * @return string
     */
    function checked($default, $current): string
    {
        return $default == $current ? 'checked':'';
    }
}

if (! function_exists('buildCheckboxTree')) {
    /**
     * Build html tree from nodes
     *
     * @param  array  $nodes
     * @return string
     */
    function buildCheckboxTree(iterable $nodes, $nodeName, $oldNodes = [], $depth = 0): string
    {


        $html = sprintf('<ul class="tree depth-%s">', $depth);


        foreach ($nodes as $key => $node) {
            $html .= sprintf('<li class="form-check item-tree %s"><input type="checkbox" class="form-check-input" name="'.$nodeName.'['.$node->id.']" value="'.$node->id.'" %s/><label>'.$node->name.'</label>', $key, in_array($node->id, $oldNodes) ? "checked":"");

            if($node->children->isNotEmpty()){
                $html .= buildCheckboxTree($node->children, $nodeName, $oldNodes, $depth+1);
            }

            $html .= '</li>';
        }

        $html .= '</ul>';
        return $html;
    }
}

if (! function_exists('doTransaction')) {

    /**
     * @param callable $func
     * @return null|mixed
     * @throws Exception
     */
    function doTransaction(callable $func, $default = null)
    {
        DB::beginTransaction();

        try {

            $result = call_user_func($func);

            DB::commit();

            return $result;

        } catch (\Exception $e) {
            DB::rollback();
            return $default;
        } catch (\Throwable $e) {
            DB::rollback();
            return $default;
        }
    }
}

if (! function_exists('getPostfix')) {

    function getPostfix($value, $key, $before = true)
    {

        if($before){
            $pluralPostfixes = [
                'day' => ['дня', 'дней', 'дней'],
                'month' => ['месяца', 'месяцев', 'месяцев'],
                'year' => ['года', 'лет', 'лет'],
            ];
        }
        else{
            $pluralPostfixes = [
                'day' => ['день', 'дня', 'дней'],
                'month' => ['месяц', 'месяца', 'месяцев'],
                'year' => ['год', 'года', 'лет'],
            ];
        }

        $num = $value%10==1 && $value%100!=11 ? 0 : ($value%10>=2 && $value%10<=4 && ($value%100<10 || $value%100>=20) ? 1 : 2);

        return $pluralPostfixes[$key][$num];
    }


}

if (! function_exists('period')) {

    function period($term, $before = true)
    {
        $term = intval($term);

        if($term < 12)
            return $term .' '. getPostfix($term, 'month', $before);

        $years = floor($term/12);

        if($term%12){
            $month = $term - 12 * $years;
            return $years.' '.getPostfix($years, 'year', $before).' '.$month.' '.getPostfix($month, 'month', $before);
        }

        return $years.' '.getPostfix($years, 'year', $before);
    }


}
