(function ($) {
    "use strict";
    var HT = {};

    HT.setUpCkEditor = () => {
        if($('.ck-editor')){
            $('.ck-editor').each(function(){
                let editor = $(this)
                let elementId = editor.attr('id')
                let elementHeight = editor.attr('data-height')
                HT.ckeditor4(elementId, elementHeight)
            })
        }
    }
    HT.ckeditor4 = (elementId, elementHeight) => {
        if(typeof(elementHeight) == 'undefined'){
            elementHeight = 300;
        }
        CKEDITOR.replace( elementId, {
            language: 'vi', // Đặt ngôn ngữ là tiếng Việt
            height: elementHeight,
            removeButtons: '',
            entities: true,
            allowedContent: true,
            toolbarGroups: [
                { name: 'editing',     groups: [ 'find', 'selection', 'spellchecker','undo' ] },
                { name: 'links' },
                { name: 'insert' },
                { name: 'forms' },
                { name: 'tools' },
                { name: 'document',    groups: [ 'mode', 'document', 'doctools'] },
                { name: 'others' },
                { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup','colors','styles','indent'  ] },
                { name: 'paragraph',   groups: [ 'list', '', 'blocks', 'align', 'bidi' ] },
            ],
            removeButtons: 'Save,NewPage,Pdf,Preview,Print,Find,Replace,CreateDiv,SelectAll,Symbol,Block,Button,Language',
            removePlugins: "exportpdf",

        });
    }

    HT.uploadFileToInput = () =>{
        $('.upload-image').click(function () {
        let input = $(this);
        let type = $(this).attr('data-type');
        HT.setUpCkFinder2(input, type);
    });
    }
    HT.uploadImageAvatar = () =>{
        $('.image-target').click(function () {
            let input = $(this);
            let type = 'Images';
            HT.browseServeAvatar(input, type);
        })
    }
    HT.setUpCkFinder2 = (object,type) => {
        if(typeof(type) == 'underfined'){
            type = 'Images';
        }
        var finder = new CKFinder();
        finder.resourceType = type;
        finder.selectActionFunction = function(fileUrl,data) {
            var fileUrl2 = fileUrl.replace("/public", "");
            object.val(fileUrl2);
        };
        finder.popup();
    };
    HT.browseServeAvatar = (object,type) => {
        if(typeof(type) == 'underfined'){
            type = 'Images';
        }
        var finder = new CKFinder();
        finder.resourceType = type;
        finder.selectActionFunction = function(fileUrl,data) {
            var fileUrl2 = fileUrl.replace("/public", "");
            object.find('img').attr('src', fileUrl2);
            object.siblings('input').val(fileUrl2);
        };
        finder.popup();
    };

    $(document).ready(function () {
        HT.uploadFileToInput();
        HT.setUpCkEditor();
        HT.uploadImageAvatar();
    });
})(jQuery);
