<?php
/**
 * @package ImpressPages
 *
 */
namespace Plugin\AccordionAndTabs\Widget\AccordionAndTabs;


class Controller extends \Ip\WidgetController
{
    public function defaultData()
    {
        return array('number' => 2);
    }

    public function getTitle()
    {
        return __('Accordion/Tabs', 'Ip-admin', false);
    }

    public function update($widgetId, $postData, $currentData)
    {
        $postData['blocks'] = $this->prepareData($widgetId, $currentData);
        if ($postData['action'] == 'add'){
            $currentData['number'] += 1;
            $currentData['blocks'][] =  'nested'.$widgetId.'_'.$currentData['number'].'_';
            return $currentData;
        }


        if ($postData['action'] == 'remove' && $postData['block']){
            foreach ($currentData['blocks'] as $key => $block){
                if($block == $postData['block']){
                    unset($currentData['blocks'][$key]);
                    break;
                }
            }
            return $currentData;
        }
        $postData['number'] = $currentData['number'];
        return parent::update($widgetId, $postData, $currentData);
    }


    public function generateHtml($revisionId, $widgetId, $data, $skin)
    {
        $blocks = $this->prepareData($widgetId, $data);
        $data['blocks'] = $blocks;
        $data['revisionId'] = $revisionId;
        return parent::generateHtml($revisionId, $widgetId, $data, $skin);
    }

    private function prepareData($widgetId, $data){
        if (isset($data['blocks']) && is_array($data['blocks'])){
            return $data['blocks'];
        }
        $blocks = array();
        for ($i = 1; $i <= $data['number']; $i++){
            $blocks[] = 'nested'.$widgetId.'_'.$i.'_';
        }
        return $blocks;
    }

    public function duplicate($oldId, $newId, $data){
        $data['blocks'] = $this->prepareData($oldId, $data);
        $titles = array();
        foreach ($data['blocks'] as $key => $block) {
            $data['blocks'][$key] = str_replace('nested' . $oldId, 'nested' . $newId, $block);
            if (isset($data['titles'][$block])){
                $titles[$data['blocks'][$key]] = $data['titles'][$block];
            }
        }
        $data['titles'] = $titles;
        return $data;
    }
}
