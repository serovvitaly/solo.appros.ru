/*
 * File: application/view/SoloMessageBox.js
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

Ext.define('SOLO.view.SoloMessageBox', {
    extend: 'Ext.window.Window',

    height: 400,
    id: 'SoloMessageBox',
    width: 600,
    layout: {
        type: 'fit'
    },
    title: 'Сообщение',

    initComponent: function() {
        var me = this;

        Ext.applyIf(me, {
            items: [
                {
                    xtype: 'form',
                    border: false,
                    id: '',
                    bodyPadding: 10,
                    title: '',
                    items: [
                        {
                            xtype: 'textfield',
                            anchor: '100%',
                            fieldLabel: '',
                            emptyText: 'Заголовок'
                        },
                        {
                            xtype: 'combobox',
                            fieldLabel: '',
                            store: 'MessageTypes',
                            valueField: 'type'
                        },
                        {
                            xtype: 'textareafield',
                            anchor: '100%',
                            height: 221,
                            fieldLabel: '',
                            emptyText: 'Текст сообщения'
                        }
                    ]
                }
            ]
        });

        me.callParent(arguments);
    }

});