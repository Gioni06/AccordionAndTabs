var IpWidget_AccordionAndTabs = function() {
    "use strict";
    this.widgetObject = null;
    this.$names = null;
    this.data = null;

    this.init = function (widgetObject, data) {
        this.data = data;
        this.widgetObject = widgetObject;

        var context = this; // set this so $.proxy would work below. http://api.jquery.com/jquery.proxy/

        //put an overlay over the widget and open popup on mouse click event
        this.widgetObject.find('#add').on('click', function(e) {
            e.preventDefault();
            var saveData = {action: 'add', block: $(this).data('key')};
            context.widgetObject.save(saveData, true, function ($widget) {});
        });

        //put an overlay over the widget and open popup on mouse click event
        this.widgetObject.find('.remove').on('click', function(e) {
            e.preventDefault();
            var saveData = {action: 'remove', block: $(this).data('key')};
            context.widgetObject.save(saveData, true, function ($widget) {});
        });

        this.$names = widgetObject.find('.title');

        this.$names.tinymce(this.tinyMceConfig());

        $('.ipWidget-AccordionAndTabs.ipSkin-tabs').tabs();
        $('.ipWidget-AccordionAndTabs.ipSkin-default').accordion();
    };

    this.save = function (refresh) {
        var saveData = {};
        saveData.titles = {};
        this.$names.each(function($val){
            saveData.titles[$(this).data('key')] = $(this).html();
        });
        this.widgetObject.save(saveData, refresh, function($widget){});
    };

    this.tinyMceConfig = function () {
        var self = this;
        var customTinyMceConfig = ipTinyMceConfig();
        customTinyMceConfig.menubar = false;
        customTinyMceConfig.toolbar = false;
        customTinyMceConfig.toolbar1 = false;
        customTinyMceConfig.toolbar2 = false;
        customTinyMceConfig.setup = function(ed, l) {
            ed.on('change', function(e){$.proxy(self.save, self)(false)});
            //ed.on('init', function(){$(this).trigger('init.tinymce')});
        };
        customTinyMceConfig.paste_as_text = true;
        customTinyMceConfig.valid_elements = 'br';
        customTinyMceConfig.custom_shortcuts = false;
        return customTinyMceConfig;
    };

};

