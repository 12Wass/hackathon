class pageCompNestable {
    static nestable2() {
        var updateOutput = function(e) {
            var list = e.length ? e : $(e.target),
                output = list.data('output');
            if(window.JSON) {
                console.log(window.JSON.stringify(list.nestable('serialize')));//, null, 2));
            }
            else {
                console.log('JSON browser support required for this demo.');
            }
        };
        var json = '[{"id":4,"first":true,"children":[{"id":5,"children":[{"id":7}]},{"id":6,"children":[{"id":8}]}]}]';
        var options = {'json': json}
        jQuery('.js-nestable-treeview').nestable(options).on('change', updateOutput);
    }
    static init() {
        this.nestable2();
    }
}
jQuery(() => { pageCompNestable.init(); });
