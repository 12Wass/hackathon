/*!
 * dashmix - v3.1.0
 * @author pixelcave - https://pixelcave.com
 * Copyright (c) 2020
 */
!(function () {
    function e(e, a) {
        for (var t = 0; t < a.length; t++) {
            var n = a[t];
            (n.enumerable = n.enumerable || !1), (n.configurable = !0), "value" in n && (n.writable = !0), Object.defineProperty(e, n.key, n);
        }
    }
    var a = (function () {
        function a() {
            !(function (e, a) {
                if (!(e instanceof a)) throw new TypeError("Cannot call a class as a function");
            })(this, a);
        }
        var t, n;
        return (
            (t = a),
                (n = [
                    {
                        key: "initDataTables",
                        value: function () {
                            jQuery.extend(jQuery.fn.dataTable.ext.classes, { sWrapper: "dataTables_wrapper dt-bootstrap4", sFilterInput: "form-control", sLengthSelect: "form-control" }),
                                jQuery.extend(!0, jQuery.fn.dataTable.defaults, {
                                    language: {
                                        lengthMenu: "_MENU_",
                                        search: "_INPUT_",
                                        searchPlaceholder: "Rechercher..",
                                        info: "Page <strong>_PAGE_</strong> of <strong>_PAGES_</strong>",
                                        paginate: { first: '<i class="fa fa-angle-double-left"></i>', previous: '<i class="fa fa-angle-left"></i>', next: '<i class="fa fa-angle-right"></i>', last: '<i class="fa fa-angle-double-right"></i>' },
                                    },
                                }),
                                jQuery(".js-dataTable-full").dataTable({
                                    language: {
                                        processing:     "Traitement en cours...",
                                        search:         "Rechercher&nbsp;:",
                                        lengthMenu:    "Afficher _MENU_ &eacute;l&eacute;ments",
                                        info:           "Affichage de l'&eacute;lement _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
                                        infoEmpty:      "Affichage de l'&eacute;lement 0 &agrave; 0 sur 0 &eacute;l&eacute;ments",
                                        infoFiltered:   "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
                                        infoPostFix:    "",
                                        loadingRecords: "Chargement en cours...",
                                        zeroRecords:    "Aucun &eacute;l&eacute;ment &agrave; afficher",
                                        emptyTable:     "Aucune donnée disponible dans le tableau",
                                        paginate: {
                                            first:      "Premier",
                                            previous:   "Pr&eacute;c&eacute;dent",
                                            next:       "Suivant",
                                            last:       "Dernier"
                                        },
                                        aria: {
                                            sortAscending:  ": activer pour trier la colonne par ordre croissant",
                                            sortDescending: ": activer pour trier la colonne par ordre décroissant"
                                        }
                                    },
                                    ordering: false,
                                    pageLength: 10,
                                    lengthMenu: [
                                        [5, 10, 20],
                                        [5, 10, 20],
                                    ],
                                    autoWidth: !1,
                                }),
                                jQuery(".js-dataTable-buttons").dataTable({
                                    pageLength: 5,
                                    lengthMenu: [
                                        [5, 10, 20],
                                        [5, 10, 20],
                                    ],
                                    autoWidth: !1,
                                    buttons: [
                                        { extend: "copy", className: "btn btn-sm btn-primary" },
                                        { extend: "csv", className: "btn btn-sm btn-primary" },
                                        { extend: "print", className: "btn btn-sm btn-primary" },
                                    ],
                                    dom: "<'row'<'col-sm-12'<'text-center bg-body-light py-2 mb-2'B>>><'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>><'row'<'col-sm-12'tr>><'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                                }),
                                jQuery(".js-dataTable-full-pagination").dataTable({
                                    pagingType: "full_numbers",
                                    pageLength: 5,
                                    lengthMenu: [
                                        [5, 10, 20],
                                        [5, 10, 20],
                                    ],
                                    autoWidth: !1,
                                }),
                                jQuery(".js-dataTable-simple").dataTable({ pageLength: 5, lengthMenu: !1, searching: !1, autoWidth: !1, dom: "<'row'<'col-sm-12'tr>><'row'<'col-sm-6'i><'col-sm-6'p>>" });
                        },
                    },
                    {
                        key: "init",
                        value: function () {
                            this.initDataTables();
                        },
                    },
                ]),
            null && e(t.prototype, null),
            n && e(t, n),
                a
        );
    })();
    jQuery(function () {
        a.init();
    });
})();
