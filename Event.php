<?php
/**
 * Created by PhpStorm.
 * User: Nerijus
 * Date: 2014-08-26
 * Time: 17:37
 */

namespace Plugin\AccordionAndTabs;


class Event {
    public static function ipBeforeController(){
        ipAddJs(ipFileUrl('Plugin/AccordionAndTabs/assets/accordionAndTabs.js'));
        ipAddCss(ipFileUrl('Plugin/AccordionAndTabs/assets/accordionAndTabs.css'));
    }

    public static function ipWidgetDuplicated($data){
        $oldId = $data['oldWidgetId'];
        $newId = $data['newWidgetId'];
        $newRevisionId = ipDb()->selectValue('widget', 'revisionId', array('id' => $newId));
        $widgetTable = ipTable('widget');
        $sql = "
            UPDATE
                $widgetTable
            SET
                `blockName` = REPLACE(`blockName`, 'nested" . (int)$oldId . "_', 'nested" . (int)$newId . "_')
            WHERE
                `revisionId` = :newRevisionId
            ";
        ipDb()->execute($sql, array('newRevisionId' => $newRevisionId));
    }
} 