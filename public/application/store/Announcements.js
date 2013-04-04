/*
 * File: application/store/Announcements.js
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

Ext.define('MyApp.store.Announcements', {
    extend: 'Ext.data.Store',

    constructor: function(cfg) {
        var me = this;
        cfg = cfg || {};
        me.callParent([Ext.apply({
            autoLoad: true,
            storeId: 'MyJsonStore',
            pageSize: 50,
            proxy: {
                type: 'ajax',
                url: '/ajax/announcements/list',
                reader: {
                    type: 'json',
                    root: 'rows'
                }
            },
            fields: [
                {
                    name: 'id'
                },
                {
                    name: 'title'
                },
                {
                    name: 'date'
                },
                {
                    name: 'price',
                    type: 'float'
                },
                {
                    name: 'description'
                },
                {
                    name: 'link'
                },
                {
                    name: 'type'
                }
            ]
        }, cfg)]);
    }
});