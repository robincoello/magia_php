function WYSIWYG(editor, params) {
    const buttonClass = 'wysiwyg-button';

    let options = params || {};
    let buttonsOrder = options.order || ['bold', 'italic', 'underline', 'strikethrough', 'orderedlist', 'unorderedlist', 'link', 'image', 'format', 'justify', 'subscript', 'superscript', 'source'];


    let boldButton = document.createElement('button');
    boldButton.type = 'button';
    boldButton.innerText = 'B';
    boldButton.className = buttonClass;
    boldButton.style.fontWeight = 'bold';
    boldButton.addEventListener('click', function () {
        document.execCommand('bold', false, null);
    });

    let italicButton = document.createElement('button');
    italicButton.type = 'button';
    italicButton.innerText = 'I';
    italicButton.className = buttonClass;
    italicButton.style.fontStyle = 'italic';
    italicButton.addEventListener('click', function () {
        document.execCommand('italic', false, null);
    });

    let underlineButton = document.createElement('button');
    underlineButton.type = 'button';
    underlineButton.innerText = 'U';
    underlineButton.className = buttonClass;
    underlineButton.style.textDecoration = 'underline';
    underlineButton.addEventListener('click', function () {
        document.execCommand('underline', false, null);
    });

    let strikethroughButton = document.createElement('button');
    strikethroughButton.type = 'button';
    strikethroughButton.innerText = 'S';
    strikethroughButton.className = buttonClass;
    strikethroughButton.style.textDecoration = 'line-through';
    strikethroughButton.addEventListener('click', function () {
        document.execCommand('strikeThrough', false, null);
    });

    let linkButton = document.createElement('button');
    linkButton.type = 'button';
    linkButton.innerText = 'Link';
    linkButton.className = buttonClass;
    linkButton.addEventListener('click', function () {
        if (url = prompt('Enter link URL'))
            document.execCommand('createLink', false, url);
    });

    let imageButton = document.createElement('button');
    imageButton.type = 'button';
    imageButton.innerText = 'Image';
    imageButton.className = buttonClass;
    imageButton.addEventListener('click', function () {
        if (url = prompt('Enter image URL'))
            document.execCommand('insertImage', false, url);
    });

    let formatSelect = document.createElement('select');
    formatSelect.className = buttonClass;

    let formatOptionNormal = document.createElement('option');
    formatOptionNormal.value = '';
    formatOptionNormal.innerText = 'Normal';
    formatOptionNormal.addEventListener('click', function () {
        document.execCommand('formatBlock', false, '<p>');
        formatSelect.selectedIndex = 0;
    });
    formatSelect.appendChild(formatOptionNormal);

    for (let level = 1; level <= 6; level++) {
        let formatOptionTitle = document.createElement('option');
        formatOptionTitle.value = 'h' + level;
        formatOptionTitle.innerText = 'Title ' + level;
        formatOptionTitle.addEventListener('click', function () {
            document.execCommand('formatBlock', false, '<h' + level + '>');
            formatSelect.selectedIndex = 0;
        });
        formatSelect.appendChild(formatOptionTitle);
    }

    let formatOptionPre = document.createElement('option');
    formatOptionPre.value = 'pre';
    formatOptionPre.innerText = 'Pre';
    formatOptionPre.addEventListener('click', function () {
        document.execCommand('formatBlock', false, '<pre>');
        formatSelect.selectedIndex = 0;
    });
    formatSelect.appendChild(formatOptionPre);

    let justifySelect = document.createElement('select');
    justifySelect.className = buttonClass;

    let justifyOptionLeft = document.createElement('option');
    justifyOptionLeft.value = 'left';
    justifyOptionLeft.innerText = 'Left';
    justifyOptionLeft.addEventListener('click', function () {
        document.execCommand('justifyLeft', false, null);
        justifySelect.selectedIndex = 0;
    });
    justifySelect.appendChild(justifyOptionLeft);

    let justifyOptionCenter = document.createElement('option');
    justifyOptionCenter.value = 'center';
    justifyOptionCenter.innerText = 'Center';
    justifyOptionCenter.addEventListener('click', function () {
        document.execCommand('justifyCenter', false, null);
        justifySelect.selectedIndex = 0;
    });
    justifySelect.appendChild(justifyOptionCenter);

    let justifyOptionRight = document.createElement('option');
    justifyOptionRight.value = 'right';
    justifyOptionRight.innerText = 'Right';
    justifyOptionRight.addEventListener('click', function () {
        document.execCommand('justifyRight', false, null);
        justifySelect.selectedIndex = 0;
    });
    justifySelect.appendChild(justifyOptionRight);

    let justifyOptionFull = document.createElement('option');
    justifyOptionFull.value = 'full';
    justifyOptionFull.innerText = 'Full';
    justifyOptionFull.addEventListener('click', function () {
        document.execCommand('justifyFull', false, null);
        justifySelect.selectedIndex = 0;
    });
    justifySelect.appendChild(justifyOptionFull);

    let unorderedlistButton = document.createElement('button');
    unorderedlistButton.type = 'button';
    unorderedlistButton.innerText = 'UL';
    unorderedlistButton.className = buttonClass;
    unorderedlistButton.addEventListener('click', function () {
        document.execCommand('insertUnorderedList', false, null);
    });

    let orderedlistButton = document.createElement('button');
    orderedlistButton.type = 'button';
    orderedlistButton.innerText = 'OL';
    orderedlistButton.className = buttonClass;
    orderedlistButton.addEventListener('click', function () {
        document.execCommand('insertOrderedList', false, null);
    });

    let subscriptButton = document.createElement('button');
    subscriptButton.type = 'button';
    subscriptButton.innerText = 'Sub';
    subscriptButton.className = buttonClass;
    subscriptButton.addEventListener('click', function () {
        document.execCommand('subscript', false, null);
    });

    let superscriptButton = document.createElement('button');
    superscriptButton.type = 'button';
    superscriptButton.innerText = 'Sup';
    superscriptButton.className = buttonClass;
    superscriptButton.addEventListener('click', function () {
        document.execCommand('superscript', false, null);
    });


    let container = document.createElement('div');

    let toolbar = document.createElement('div');
    toolbar.className = 'wysiwyg-toolbar';
    container.appendChild(toolbar);

    let content = document.createElement('div');
    content.contentEditable = true;
    content.className = 'wysiwyg-content';
    content.innerHTML = editor.value.trim();
    content.style.overflow = 'auto';
    container.appendChild(content);

    let toggleSourceButton = document.createElement('button');
    toggleSourceButton.type = 'button';
    toggleSourceButton.innerText = 'Source';
    toggleSourceButton.className = buttonClass;
    toggleSourceButton.addEventListener('click', function () {
        if (editor.style.display === 'block') {
            content.innerHTML = editor.value;
            content.style.display = 'block';
            editor.style.display = 'none';
            content.style.width = editor.style.width;
            content.style.height = editor.style.height;
        } else {
            editor.value = content.innerHTML;
            content.style.display = 'none';
            editor.style.display = 'block';
            editor.style.width = content.style.width;
            editor.style.height = content.style.height;
        }
    });

    const allButtons = {
        'bold': boldButton,
        'italic': italicButton,
        'underline': underlineButton,
        'strikethrough': strikethroughButton,
        'link': linkButton,
        'image': imageButton,
        'format': formatSelect,
        'justify': justifySelect,
        'orderedlist': orderedlistButton,
        'unorderedlist': unorderedlistButton,
        'subscript': subscriptButton,
        'superscript': superscriptButton,
        'source': toggleSourceButton
    };

    buttonsOrder.forEach(function (button) {
        if (allButtons.hasOwnProperty(button)) {
            toolbar.appendChild(allButtons[button]);
        } else {
            console.error('[WYSIWYG] Button ' + button + ' does not exist.');
        }
    });

    content.className = editor.className;

    let editorStyle = window.getComputedStyle(editor);
    content.style.width = editorStyle.getPropertyValue('width');
    content.style.height = editorStyle.getPropertyValue('height');
    content.style.resize = editorStyle.getPropertyValue('resize');

    content.addEventListener('keyup', function () {
        editor.value = content.innerHTML;
    });

    editor.parentNode.insertBefore(container, editor);
    editor.style.display = 'none';

    document.execCommand('defaultParagraphSeparator', false, 'p');
}
