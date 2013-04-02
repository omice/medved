$().ready(function(){
//------------ NAVIGATION -----------------
    var MainMenuView = Backbone.View.extend({
        el: $('#top_menu'),

        initialize: function() {

            MenuItemList.bind('reset', this.addAll, this);
            MenuItemList.bind('all', this.render, this);
            MenuItemList.fetch();
            // this.render();
        },

        render: function() {},

        addAll: function() {
            MenuItemList.each(
                function(model) {
                    var view = new MainMenuItemView({model: model})
                    this.$el.append(view.render().el);
                    EC.bindEvent(new EventObject('go', {
                        type: 'model',
//                        from: 'url',
                        from: 'collection',
                        source: model.get('url'),
                        alias: model.get('name')
                    }));
                },this

            );
        }
    });

    var MainMenuItemView = Backbone.View.extend({

        itemTemplate:_.template($('#tmp_top_menu_item').html()),

        events: {
            "click .top_menu_item":  "goPage"
        },

        render:     function(){
            this.$el.html(this.itemTemplate(this.model.toJSON()));
            return this;
        },

        goPage:     function(e){

            EC.initEvent(this.model.get('name'));

            return false;
        },

        setActived:  function(el){

            $('.top_menu_item').css('background-color', 'transparent');
            $(el).css('background-color','#FF7c5b');
            return false;
        }

    });


    var MainMenuItemModel = Backbone.Model.extend({

        defaults: {
            url: ''
        },

        urlRoot: '/',

        initialize: function(params) {

            if(params && params.url){
                this.url    = params.url;
            }else{
                this.url    = this.defaults.url;
            }
        }

    });

    var MenuItemCollection    = Backbone.Collection.extend({

        url:    '/front/getPageList',
        model:  MainMenuItemModel
    });
//------------ /NAVIGATION ----------------

    var PageContentModel   = Backbone.Model.extend({

        defaults: {
            url: ''
        },

        urlRoot: '/',

        initialize: function(params) {

            if(params && params.url){
                this.url    = params.url;
            }else{
                this.url    = this.defaults.url;
            }
        }
    });

    var PageContentCollection    = Backbone.Collection.extend({

        model:  PageContentModel,

        defaults: {
            url:    '/front/getContentModel'
        },

        initialize: function(params) {

            if(params && params.url){
                this.url    = params.url;
            }else{
                this.url    = this.defaults.url;
            }

            $this = this;
            this.fetch({
                success: function(response){
                    console.log(response);
                    $this.add(response, {at : 'index'});
                }
            });
        }
    });

    window.MenuItemList             = new MenuItemCollection();
    window.MainMenuView             = new MainMenuView();
    window.PageContentCollection    = new PageContentCollection();
    window.EC   = new EventController(new PageContentController);


});

var PageContentModel   = Backbone.Model.extend({

    defaults: {
        url: ''
    },

    urlRoot: '/',

    initialize: function(params) {

        if(params && params.url){
            this.url    = params.url;
        }else{
            this.url    = this.defaults.url;
        }
    }
});

function EventController(context){

    this.eventList  = new Object,
    this.context    = context;

//    if (!(this.context instanceof ifEventListener))
//        throw new EventException('context must be instance of ifEventListener.');

    this.throwEvent = function(eObject){

        if (!(eObject instanceof EventObject))
            throw new EventException('Unknown EventObject');

        this.context.initEvent(eObject);
    }

    this.bindEvent = function(eObject){
        if (!(eObject instanceof EventObject))
            throw new EventException('Unknown EventObject');

        if (eObject.alias){
            this.eventList[eObject.alias] = eObject;
        }else{
            this.eventList[eObject.name] = eObject;
        }
    }

    this.initEvent = function(eventName, options){

        if(!this.eventList[eventName])
            throw new EventException('Called event not exist');

        this.throwEvent(this.eventList[eventName]);
    }

}

function EventObject(eName, eOptions){

    this.name = eName;

    this.type = function(){// default 'model'
        return eOptions.type ? eOptions.type : undefined;
    }();

    this.from = function(){// collection/url
        if (eOptions.from)
            return eOptions.from;
        throw new EventException('"from" not found');
    }();

    this.source = function(){// path to data
        if (eOptions.source)
            return eOptions.source;
        throw new EventException('"source" not found');
    }();

    this.alias  = function(){// alias of source
        return eOptions.alias ? eOptions.alias : undefined;
    }();

    return this;
}


var PageContentController = Backbone.View.extend({

    el: '#mainContent',

    eventList: {
        'go': 'goPage'
    },

    getViewContent:   function(templateName, templateData){
        var view = _.template($('#' + templateName).html());
        return view(templateData);
    },

    showViewContent: function(templateName, templateData){

        this.$el.html(this.getViewContent(templateName, templateData));
    },

    renderView: function(view){
        this.$el.html(view);
    },

    initEvent: function(eObject){
        if(!(eObject instanceof EventObject)){
            throw new EventException('Invalid EventObject');
        }

        if(this.eventList[eObject.name]){
            eval('this.' + this.eventList[eObject.name] + '(eObject);');
        }
    },

    goPage:     function(e){

        var $this = this;
        if (e.type == 'model'){

            if (e.from == 'collection'){
                var model = PageContentCollection.at(e.alias);

            }else if(e.from == 'url'){
                var model = new PageContentModel({url:e.source})
            }

            console.log(e.alias);
            console.log(model);

//            model.fetch({
//                success: function(response){
//                    $this.$el.html($(response.get('html')));
//                },
//                error: function(response){
//                    console.log(response);
//                }
//            });

        }

        return false;
    }
});