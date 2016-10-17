Ext.define('MyAppName.store.Personnel', {
    extend: 'Ext.data.Store',

    alias: 'store.personnel',

    fields: [
        'name', 'email', 'phone'
    ],
    proxy: {
        type: 'ajax',
        url: 'http://localhost/test_task/starcode/readtables.php',
        reader: {
            type: 'json',
        }
    },
    autoLoad: true
});