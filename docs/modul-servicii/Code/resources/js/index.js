let committeeShow = document.getElementsByClassName('committee-number');
let committeeComposition = document.getElementsByClassName('composition-committee');


for (let i = 0; i <= committeeShow.length; i++ ) {
    committeeShow[i].onclick = function() {
        if (committeeComposition[i].style.display === 'none') {
            committeeComposition[i].style.display = 'block';
        } else {
            committeeComposition[i].style.display = 'none';
        }
    }
}
