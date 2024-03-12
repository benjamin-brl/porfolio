document.addEventListener("DOMContentLoaded", () => {
    const svg = SVG().addTo('#svg-container');

    const pathData = 'M 0 80 Q 95 -20 180 80 Q 265 180 350 80 Q 435 -20 520 80 Q 605 180 690 80';
    const loopPath = svg.path(pathData);

    function updatePath(scrollPos = 0) {
        const controlY = 80 + scrollPos;
        console.log(controlY)
        const newPathData = `M 0 80 Q 95 ${controlY - 100} 180 80 Q 265 ${260 - controlY} 350 80 Q 435 ${controlY - 100} 520 80 Q 605 ${260 - controlY} 690 80`;
        loopPath.plot(newPathData);
    }

    document.body.addEventListener('scroll', (e) => {
        console.clear()
        console.log(`scrollY : ${scrollY}`)
        console.log(`scrollHeight : ${document.documentElement.scrollHeight}`)
        console.log(`innerHeight : ${window.innerHeight}`)
        if (document.documentElement.scrollHeight == window.innerHeight) {
            var scrollPercentage = parseInt(scrollY / 1 * 100)
        } else {
            var scrollPercentage = parseInt(scrollY / (document.documentElement.scrollHeight - window.innerHeight) * 100)
        }
        console.log(`scrollPercentage : ${scrollPercentage}`)
        updatePath(scrollPercentage);
    });

    const converter = new showdown.Converter();
    $('[data-markdown]').each(function () {
        $(this).html(converter.makeHtml($(this).text()));
    });
});