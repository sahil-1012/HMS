
function scrollToTop() {
    var anchor = document.querySelector("[data-scroll-to='saareOptionsContainer']");
    if (anchor) {
        anchor.scrollIntoView({
            block: "start",
            behavior: "smooth"
        });
    }
}

function scrollToBottom() {
    console.log("clicked bottom");
    var anchor = document.querySelector("[data-scroll-to='bottom']");
    if (anchor) {
        anchor.scrollIntoView({
            block: "start",
            behavior: "smooth"
        });
    }
}