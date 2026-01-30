const el = element.innerHTML;

function bad1(userInput) {
    // ruleid: custom-insecure-document-method
    el.innerHTML = '<div>' + userInput + '</div>';
}

function bad2(userInput) {
    // ruleid: custom-insecure-document-method
    document.body.outerHTML = userInput;
}

function bad3(userInput) {
    const name = '<div>' + userInput + '</div>';
    // ruleid: custom-insecure-document-method
    document.write(name);
}

function ok1() {
    const name = "<div>it's ok</div>";
    // ok: custom-insecure-document-method
    el.innerHTML = name;
}

function ok2() {
    // ok: custom-insecure-document-method
    document.write("<div>it's ok</div>");
}

(function ok3(userInput) {
    import DOMPurify from 'dompurify';

    const el = element.innerHTML;

    // ok: custom-insecure-document-method
    document.write(DOMPurify.sanitize(userInput));

    // ok: custom-insecure-document-method
    document.body.outerHTML = DOMPurify.sanitize(userInput);

    // ok: custom-insecure-document-method
    el.innerHTML = DOMPurify.sanitize(userInput);
})()

(function ok4(userInput) {
    import {sanitize} from 'dompurify';

    const el = element.innerHTML;

    // ok: custom-insecure-document-method
    document.write(sanitize(userInput));

    // ok: custom-insecure-document-method
    document.body.outerHTML = sanitize(userInput);

    // ok: custom-insecure-document-method
    el.innerHTML = sanitize(userInput);
})()

(function notOkNotImported(userInput) {
    const el = element.innerHTML;

    // ruleid: custom-insecure-document-method
    document.write(sanitize(userInput));

    // ruleid: custom-insecure-document-method
    document.body.outerHTML = sanitize(userInput);

    // ruleid: custom-insecure-document-method
    el.innerHTML = sanitize(userInput);

    // ruleid: custom-insecure-document-method
    document.write(DOMPurify.sanitize(userInput));

    // ruleid: custom-insecure-document-method
    document.body.outerHTML = DOMPurify.sanitize(userInput);

    // ruleid: custom-insecure-document-method
    el.innerHTML = DOMPurify.sanitize(userInput);
})()