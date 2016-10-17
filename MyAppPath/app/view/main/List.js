/**
 * This view is an example list of people.
 */
Ext.define('MyAppName.view.main.List', {
    extend: 'Ext.grid.Panel',
    xtype: 'mainlist',

    requires: [
        'MyAppName.store.Personnel'
    ],

    title: 'Personnel',

    store: {
        type: 'personnel'
    },
    columns: [
        { text: 'Id',  dataIndex: 'id' },
        { text: 'IP', dataIndex: 'ip', flex: 1 },
        { text: 'Browser', dataIndex: 'browser_name', flex: 1 },
        { text: 'OS', dataIndex: 'os_name', flex: 1 },
        { text: 'URL_From', dataIndex: 'url_from', flex: 1 },
        { text: 'URL_To', dataIndex: 'url_to', flex: 1 },
    ],
    listeners: {
        select: 'onItemSelected'
    }
});
