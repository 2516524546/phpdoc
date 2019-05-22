  var init_data = [];
    layui.use('table', function(){
        var table = layui.table;
        console.log(init_data);
        var db = '{$db|raw}';
        db =  JSON.parse(db);

        var obj = Object.assign(db, init_data);
        // console.log(db);
        //展示已知数据
        table.render({
            elem: '#datalists',
            toolbar: '#toolbardata',
            cellMinWidth: 80,
            totalRow: true,
            skin: 'line',//表格风格
            even: true,
            //page: true, //是否显示分页
            //limit: 20, //每页默认显示的数量
            //limits : [5, 10, 15, 20, 25],
            cols: [[ //标题栏
                {field: 'imei', title: 'IMEI',fixed: 'left'}
                ,{field: 'sn', title: 'SN'}
                ,{field: 'model', title: '型号'}
                ,{field: 'price', title: '价格', totalRow: true}
                ,{field: 'locked', title: '激活锁'}
                ,{field: 'icloud', title: '黑白'}
            ]],

            data: obj
        });
