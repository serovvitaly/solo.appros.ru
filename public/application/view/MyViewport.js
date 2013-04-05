/*
 * File: application/view/MyViewport.js
 *
 * This file was generated by Sencha Architect version 2.2.0.
 * http://www.sencha.com/products/architect/
 *
 * This file requires use of the Ext JS 4.2.x library, under independent license.
 * License of Sencha Architect does not include license for Ext JS 4.2.x. For more
 * details see http://www.sencha.com/license or contact license@sencha.com.
 *
 * This file will be auto-generated each and everytime you save your project.
 *
 * Do NOT hand edit this file.
 */

Ext.define('SOLO.view.MyViewport', {
    extend: 'Ext.container.Viewport',

    layout: {
        type: 'border'
    },

    initComponent: function() {
        var me = this;

        Ext.applyIf(me, {
            style: {
                background: '#41577E'
            },
            items: [
                {
                    xtype: 'container',
                    region: 'north',
                    height: 50
                },
                {
                    xtype: 'panel',
                    region: 'west',
                    split: true,
                    splitterResize: false,
                    border: false,
                    maxWidth: 350,
                    minWidth: 200,
                    width: 300,
                    autoScroll: true,
                    layout: {
                        type: 'border'
                    },
                    bodyStyle: {
                        background: 'none'
                    },
                    collapsible: true,
                    header: false,
                    title: 'Фильтры',
                    items: [
                        {
                            xtype: 'form',
                            region: 'north',
                            bodyPadding: 10,
                            title: 'Параметры фильтрации',
                            dockedItems: [
                                {
                                    xtype: 'toolbar',
                                    dock: 'bottom',
                                    items: [
                                        {
                                            xtype: 'button',
                                            text: 'Применить'
                                        },
                                        {
                                            xtype: 'button',
                                            text: 'Сбросить'
                                        },
                                        {
                                            xtype: 'button',
                                            handler: function(button, event) {
                                                alert('click saver');
                                            },
                                            text: 'Сохранить фильтр'
                                        }
                                    ]
                                },
                                {
                                    xtype: 'panel',
                                    dock: 'bottom',
                                    padding: '',
                                    layout: {
                                        type: 'column'
                                    },
                                    bodyPadding: 5,
                                    title: '',
                                    items: [
                                        {
                                            xtype: 'textfield',
                                            width: 235,
                                            fieldLabel: '',
                                            emptyText: 'Имя фильтра'
                                        },
                                        {
                                            xtype: 'button',
                                            margin: '0 3 0 3',
                                            icon: '/bundles/solo/icons/accept.png',
                                            text: '',
                                            tooltip: 'Сохранить',
                                            tooltipType: 'title'
                                        },
                                        {
                                            xtype: 'button',
                                            icon: '/bundles/solo/icons/cancel.png',
                                            text: '',
                                            tooltip: 'Отмена',
                                            tooltipType: 'title'
                                        }
                                    ]
                                }
                            ],
                            items: [
                                {
                                    xtype: 'fieldset',
                                    defaults: {
                                        columnWidth: .5,
                                        
                                    },
                                    layout: {
                                        type: 'column'
                                    },
                                    title: 'Тип сделки',
                                    items: [
                                        {
                                            xtype: 'checkboxfield',
                                            fieldLabel: '',
                                            boxLabel: 'Купля'
                                        },
                                        {
                                            xtype: 'checkboxfield',
                                            fieldLabel: '',
                                            boxLabel: 'Продажа'
                                        }
                                    ]
                                },
                                {
                                    xtype: 'fieldset',
                                    defaults: {
                                        padding: '0 10 0 0'
                                    },
                                    layout: {
                                        type: 'column'
                                    },
                                    title: 'Количество комнат',
                                    items: [
                                        {
                                            xtype: 'checkboxfield',
                                            fieldLabel: '',
                                            boxLabel: '1'
                                        },
                                        {
                                            xtype: 'checkboxfield',
                                            fieldLabel: '',
                                            boxLabel: '2'
                                        },
                                        {
                                            xtype: 'checkboxfield',
                                            fieldLabel: '',
                                            boxLabel: '3'
                                        },
                                        {
                                            xtype: 'checkboxfield',
                                            fieldLabel: '',
                                            boxLabel: '4'
                                        },
                                        {
                                            xtype: 'checkboxfield',
                                            fieldLabel: '',
                                            boxLabel: '5'
                                        },
                                        {
                                            xtype: 'checkboxfield',
                                            fieldLabel: '',
                                            boxLabel: '>5'
                                        }
                                    ]
                                },
                                {
                                    xtype: 'fieldset',
                                    title: 'Цены, руб.',
                                    items: [
                                        {
                                            xtype: 'fieldcontainer',
                                            layout: {
                                                type: 'column'
                                            },
                                            fieldLabel: '',
                                            items: [
                                                {
                                                    xtype: 'numberfield',
                                                    columnWidth: 0.5,
                                                    id: 'PriceOt',
                                                    margin: '0 3 0 0',
                                                    fieldLabel: 'от',
                                                    labelWidth: 16
                                                },
                                                {
                                                    xtype: 'numberfield',
                                                    columnWidth: 0.5,
                                                    id: 'PriceDo',
                                                    margin: '0 0 0 3',
                                                    fieldLabel: 'до',
                                                    labelWidth: 16
                                                }
                                            ]
                                        },
                                        {
                                            xtype: 'multislider',
                                            anchor: '100%',
                                            fieldLabel: '',
                                            maxValue: 100000000,
                                            useTips: false,
                                            values: [
                                                1000000,
                                                50000000
                                            ],
                                            listeners: {
                                                change: {
                                                    fn: me.onMultisliderChange,
                                                    scope: me
                                                }
                                            }
                                        },
                                        {
                                            xtype: 'checkboxfield',
                                            anchor: '100%',
                                            fieldLabel: '',
                                            boxLabel: 'показывать объявления без цены',
                                            checked: true
                                        }
                                    ]
                                },
                                {
                                    xtype: 'fieldset',
                                    title: 'Период публикации',
                                    items: [
                                        {
                                            xtype: 'fieldcontainer',
                                            layout: {
                                                type: 'column'
                                            },
                                            fieldLabel: '',
                                            items: [
                                                {
                                                    xtype: 'datefield',
                                                    columnWidth: 0.5,
                                                    margin: '0 3 0 0',
                                                    fieldLabel: 'с',
                                                    labelWidth: 16,
                                                    format: 'd.m.Y'
                                                },
                                                {
                                                    xtype: 'datefield',
                                                    columnWidth: 0.5,
                                                    margin: '0 0 0 3',
                                                    fieldLabel: 'по',
                                                    labelWidth: 16,
                                                    format: 'd.m.Y'
                                                }
                                            ]
                                        },
                                        {
                                            xtype: 'checkboxfield',
                                            anchor: '100%',
                                            fieldLabel: '',
                                            boxLabel: 'показывать только за текущие сутки'
                                        },
                                        {
                                            xtype: 'fieldcontainer',
                                            layout: {
                                                type: 'column'
                                            },
                                            fieldLabel: 'за последние',
                                            labelWidth: 85,
                                            items: [
                                                {
                                                    xtype: 'numberfield',
                                                    width: 49,
                                                    fieldLabel: ''
                                                },
                                                {
                                                    xtype: 'label',
                                                    padding: '7 5 0 5',
                                                    text: 'дн.'
                                                },
                                                {
                                                    xtype: 'numberfield',
                                                    width: 50,
                                                    fieldLabel: ''
                                                },
                                                {
                                                    xtype: 'label',
                                                    padding: '7 0 0 5',
                                                    text: 'час.'
                                                }
                                            ]
                                        }
                                    ]
                                }
                            ]
                        },
                        {
                            xtype: 'panel',
                            region: 'center',
                            margin: '3 0 0',
                            layout: {
                                type: 'fit'
                            },
                            title: 'Список фильтров',
                            items: [
                                {
                                    xtype: 'treepanel',
                                    border: false,
                                    autoScroll: true,
                                    title: '',
                                    store: 'FiltersStore',
                                    viewConfig: {
                                        rootVisible: false
                                    }
                                }
                            ]
                        }
                    ]
                },
                {
                    xtype: 'toolbar',
                    region: 'south',
                    height: 20,
                    margin: '1 0 0'
                },
                {
                    xtype: 'tabpanel',
                    region: 'center',
                    activeTab: 0,
                    plain: true,
                    items: [
                        {
                            xtype: 'panel',
                            layout: {
                                padding: 1,
                                type: 'border'
                            },
                            title: 'База объявлений',
                            items: [
                                {
                                    xtype: 'gridpanel',
                                    region: 'center',
                                    title: '',
                                    store: 'Announcements',
                                    columns: [
                                        {
                                            xtype: 'gridcolumn',
                                            align: 'right',
                                            dataIndex: 'id',
                                            text: 'ИД'
                                        },
                                        {
                                            xtype: 'gridcolumn',
                                            renderer: function(value, metaData, record, rowIndex, colIndex, store, view) {
                                                if (value && value.length > 0) {
                                                    return '<img style="margin-bottom: -5px;" src="/bundles/solo/icons/camera.png" alt="+">';   
                                                } else return '';
                                            },
                                            width: 47,
                                            align: 'center',
                                            dataIndex: 'imgs',
                                            text: 'Фото'
                                        },
                                        {
                                            xtype: 'gridcolumn',
                                            renderer: function(value, metaData, record, rowIndex, colIndex, store, view) {
                                                return '<strong>'+value+'</strong>';
                                            },
                                            dataIndex: 'title',
                                            text: 'Заголовок',
                                            flex: 1
                                        },
                                        {
                                            xtype: 'gridcolumn',
                                            renderer: function(value, metaData, record, rowIndex, colIndex, store, view) {
                                                var els = value.split('.');

                                                var cpmns = {
                                                    k1: '1-а',
                                                    k2: '2-х',
                                                    k3: '3-х',
                                                    k4: '4-х',
                                                    k5: '5-и',
                                                    kb5: '>5-и'
                                                };

                                                return cpmns[els[2]];
                                            },
                                            width: 60,
                                            align: 'right',
                                            dataIndex: 'type',
                                            text: 'Комнат'
                                        },
                                        {
                                            xtype: 'gridcolumn',
                                            renderer: function(value, metaData, record, rowIndex, colIndex, store, view) {
                                                if (!value) return;

                                                var els = value.split('.');


                                                var types = {
                                                    sale: 'продажа',
                                                    purchase: 'купля'
                                                };

                                                var colors = {
                                                    sale: '#07A75A',
                                                    purchase: '#0085FF'
                                                };

                                                return '<span style="color:' + colors[els[1]] + '">' + types[els[1]] + '</span>';
                                            },
                                            width: 80,
                                            dataIndex: 'type',
                                            text: 'Тип сделки'
                                        },
                                        {
                                            xtype: 'datecolumn',
                                            width: 120,
                                            dataIndex: 'date',
                                            text: 'Опубликовано',
                                            format: 'H:i - d.m.Y'
                                        },
                                        {
                                            xtype: 'numbercolumn',
                                            align: 'right',
                                            dataIndex: 'price',
                                            text: 'Цена'
                                        }
                                    ],
                                    dockedItems: [
                                        {
                                            xtype: 'pagingtoolbar',
                                            dock: 'bottom',
                                            loader: {
                                                limit: 100
                                            },
                                            width: 360,
                                            displayInfo: true,
                                            store: 'Announcements',
                                            items: [
                                                {
                                                    xtype: 'combobox',
                                                    width: 50,
                                                    fieldLabel: '',
                                                    store: [
                                                        25,
                                                        50,
                                                        100,
                                                        200,
                                                        500
                                                    ]
                                                }
                                            ]
                                        }
                                    ],
                                    listeners: {
                                        selectionchange: {
                                            fn: me.onGridpanelSelectionChange,
                                            scope: me
                                        }
                                    }
                                },
                                {
                                    xtype: 'panel',
                                    region: 'east',
                                    split: true,
                                    id: 'FullContent',
                                    tpl: [
                                        '<div>',
                                        '    <strong>{title}</strong>',
                                        '    <p><a target="_balnk" href="{link}">Источник</a></p>',
                                        '    <p><a style="color: red; font-weight: bold;" href="#" onclick="return showMap({id})">Показать на карте</a></p>',
                                        '    <p><span style="color: gray">Метро:</span> {metro}</p>',
                                        '    <p><span style="color: gray">Адрес:</span> {address}</p>',
                                        '    <p><span style="color: gray">Цена:</span> {price}</p>',
                                        '    <div style="margin: 0 -10px; padding: 10px; background: #F3F3F3;">{description}</div>',
                                        '</div>',
                                        '',
                                        '<div style="margin: 20px 0">',
                                        '    <tpl for="images">',
                                        '        <a href="{big}" target="_blank" onclick="return showBigImage({parent.id},\'{big}\');"><img src="{small}" alt=""></a>',
                                        '    </tpl>',
                                        '</div>'
                                    ],
                                    width: 300,
                                    autoScroll: true,
                                    bodyPadding: 10,
                                    collapsible: true,
                                    header: false,
                                    title: 'Подробное описание'
                                }
                            ]
                        },
                        {
                            xtype: 'panel',
                            html: '<h1 style="text-align:center">Здесь скоро будет карта</h1>',
                            title: 'Общая карта'
                        },
                        {
                            xtype: 'panel',
                            layout: {
                                type: 'fit'
                            },
                            title: 'Замечания и пожелания',
                            items: [
                                {
                                    xtype: 'gridpanel',
                                    border: false,
                                    title: '',
                                    store: 'Messages',
                                    columns: [
                                        {
                                            xtype: 'gridcolumn',
                                            dataIndex: 'string',
                                            text: 'String'
                                        },
                                        {
                                            xtype: 'numbercolumn',
                                            dataIndex: 'number',
                                            text: 'Number'
                                        },
                                        {
                                            xtype: 'datecolumn',
                                            dataIndex: 'date',
                                            text: 'Date'
                                        },
                                        {
                                            xtype: 'booleancolumn',
                                            dataIndex: 'bool',
                                            text: 'Boolean'
                                        }
                                    ],
                                    dockedItems: [
                                        {
                                            xtype: 'toolbar',
                                            dock: 'top',
                                            defaults: {
                                                scale: 'medium'
                                            },
                                            items: [
                                                {
                                                    xtype: 'button',
                                                    text: 'Неисправность'
                                                },
                                                {
                                                    xtype: 'button',
                                                    text: 'Замечание'
                                                },
                                                {
                                                    xtype: 'button',
                                                    text: 'Пожелание'
                                                }
                                            ]
                                        }
                                    ]
                                }
                            ]
                        }
                    ]
                }
            ]
        });

        me.callParent(arguments);
    },

    onMultisliderChange: function(slider, newValue, thumb, eOpts) {

        var target = null;

        if (thumb.index === 0) {
            target = 'PriceOt';
        }

        if (thumb.index === 1) {
            target = 'PriceDo';
        }

        if (target) {
            Ext.getCmp(target).setValue(newValue);
        }
    },

    onGridpanelSelectionChange: function(model, selected, eOpts) {

        if (selected.length < 1) {
            return;   
        }

        var data = selected[0].data;

        var imgs = [];
        if (data.imgs && data.imgs.length > 0) {
            for (iter = 0; iter <= data.imgs.length; iter++) {
                if (data.imgs[iter]){
                    imgs.push({
                        big: data.imgs[iter],
                        small: data.imgs[iter].replace('640x480', '80x60')
                    });
                }
            }  
        }
        data.images = imgs;

        var content_box = Ext.getCmp('FullContent');

        content_box.update(data);
    }

});