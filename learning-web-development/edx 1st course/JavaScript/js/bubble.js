var sections = document.getElementsByTagName('section');

for (var index = 0; index < sections.length; index++) {
    sections[index].onclick = handleClick;
}

function handleClick (event) {
    console.log('current element: ' + this.className + ' | target element: ' + event.target.className); /* sau this.className */

    if (this.className == 'regular') {
        event.stopPropagation();
        console.log('event propogation stopped');
    }
}