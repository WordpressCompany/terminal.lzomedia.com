

const Terminal = function (opt) {
    let options = { delay: {} };

    let container = document.querySelector(opt.containerSelector);
    console.log(opt.containerSelector);
    let lines;

    options.hideOnLoad = "hideOnLoad" in opt ? opt.hideOnLoad : true;
    options.leaveCursor = "leaveCursor" in opt ? opt.leaveCursor : true;
    options.replayable = "replayable" in opt ? opt.replayable : true;
    options.callback = "callback" in opt ? opt.callback : false;

    if (!("delay" in opt)) {
        opt.delay = {};
    }

    options.delay.characters =
        "characters" in opt.delay ? opt.delay.characters : 90;
    options.delay.lines = "lines" in opt.delay ? opt.delay.lines : 1200;

    prepare();

    if ("start" in opt.delay) {
        start(opt.delay.start);
    }

    return {
        start: start,
    }

    function prepare() {
        lines = container.querySelectorAll("code");

        if (options.hideOnLoad) {
            const style = getComputedStyle(container);

            container.style.width = style.width;
            container.style.minHeight = style.height;

            container.innerHTML = "";

            const placeholderCursor = constructPlaceholderCursor();
            container.appendChild(placeholderCursor);
        }
    }

    async function start(ms) {
        if (ms !== undefined) {
            await delay(ms);
        }

        container.innerHTML = "";

        let numLines = lines.length;

        for (let line of lines) {
            if (line.hasAttribute("data-term-input")) {
                await line.setAttribute("data-term-cursor", true);
                await type(line);
            } else {
                container.appendChild(line);
            }

            if (line.hasAttribute("data-term-delay")) {
                await delay(line.getAttribute("data-term-delay"));
            } else {
                await delay(options.delay.lines);
            }

            if (!--numLines && options.leaveCursor) {
                await line.setAttribute("data-term-cursor", true);
            } else {
                await line.removeAttribute("data-term-cursor");
            }
        }

        if (opt.replayable) {
            const replayCtrl = constructReplayCtrl();
            container.appendChild(replayCtrl);
        }

        if (opt.callback) {
            opt.callback();
        }
    }

    async function delay(ms) {
        return new Promise((resolve) => {
            setTimeout(resolve, ms);
        });
    }

    async function type(line) {
        const chars = [...line.textContent];
        line.textContent = "";
        container.appendChild(line);

        for (let char of chars) {
            await delay(options.delay.characters);
            line.textContent += char;
        }
    }

    function constructPlaceholderCursor() {
        const cursor = document.createElement("code");
        cursor.setAttribute("data-term-input", true);
        cursor.setAttribute("data-term-cursor", true);

        return cursor;
    }

    function constructReplayCtrl() {
        const replayCtrl = document.createElement("span");
        replayCtrl.setAttribute("data-term-replay", true);
        replayCtrl.appendChild(document.createTextNode("Replay"));
        replayCtrl.onclick = (event) => {
            start();
        };

        return replayCtrl;
    }
}

export default Terminal;


function getCookie(name) {
    var dc = document.cookie;
    var prefix = name + "=";
    var begin = dc.indexOf("; " + prefix);
    if (begin === -1) {
        begin = dc.indexOf(prefix);
        if (begin !== 0) return null;
    }
    else
    {
        begin += 2;
        var end = document.cookie.indexOf(";", begin);
        if (end === -1) {
            end = dc.length;
        }
    }

    return decodeURI(dc.substring(begin + prefix.length, end));
}

document.getElementById("page").style.display = "block";
document.getElementById("editor").style.display = "none";

var myCookie = getCookie("loaded");

if (myCookie == null) {

    console.log('');

    document.getElementById("page").style.display = "none";

    document.getElementById("editor").style.display = "block";


    const term = Terminal({
        containerSelector: "#editor", // required
        hideOnLoad: true,               // hide the terminal output on load in preperation to animate
        replayable: false,               // add a replay control after animation
        leaveCursor: true,              // leave a blinking cursor on the last line after animation
        delay: {
            start: 1200,                  // start the animation on load after 1200 milliseconds
            characters: 90,               // millisecondds between each character
            lines: 1000,                  // milliseconds between each line
        },
        callback: () => {               // called after animation has finished
            document.getElementById("page").style.display = "block";
            document.getElementById("editor").style.display = "none";
            document.cookie = "loaded=true";

        },
    });
}



document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll("pre code").forEach(block => {
        window.hljs.highlightBlock(block);
    });
});
