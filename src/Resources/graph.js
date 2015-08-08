/**
 @param {Element} form
 @param {Element} to
 */
function connect(from, to, color)
{
    color = color || 'C53725';
    if(!from || !to)
        return;

    var startX = from.offsetLeft + from.offsetWidth/2;
    var startY = from.offsetTop + from.offsetHeight/2;

    var endX = to.offsetLeft + to.offsetWidth/2;
    var endY = to.offsetTop + to.offsetHeight/2;

    var length = Math.sqrt((startX-endX)*(startX-endX) + (startY-endY)*(startY-endY));
    var angle  = Math.atan2(endY - startY, endX - startX) * 180 / Math.PI;

    var lines = document.getElementById('lines');
    lines.innerHTML = lines.innerHTML + '<div style="-webkit-transform: rotate(' + angle + 'deg);transform-origin: 0 100%  ; background-color: #' + color + '; position: absolute; top: ' +
        startY + 'px;left: ' + startX + 'px; width: ' + length + 'px; height: 3px; z-index: -1;"></div>';
}