/* Likes Actions */

const like = document.getElementById('like');
const dislike = document.getElementById('dislike');
const root = 'multimediagallery';

like.addEventListener('click', funcLike);
dislike.addEventListener('click', funcDislike);

function funcLike(e) {
    like.classList.remove('ri-thumb-up-line');
    like.classList.add('ri-thumb-up-fill');
}

function funcDislike(e) {
    dislike.classList.remove('ri-thumb-down-line');
    dislike.classList.add('ri-thumb-down-fill');
}

const btnLike = document.getElementById('btn-like');
const btnDislike = document.getElementById('btn-dislike');
const channelContent = document.getElementById('channel_content');

btnLike.addEventListener('click', funcClickLike);
btnDislike.addEventListener('click', funcClickDislike);

function funcClickLike(e) {
    e.preventDefault();

    let xhr = new XMLHttpRequest();
    xhr.open('GET', `http://localhost/${root}/channel-content/?like=${btnLike.value}&channel_content=${channelContent}.value`, true);
    xhr.send(xhr);

    document.getElementById('count-likes').textContent = btnLike.value;
}
function funcClickDislike(e) {
    e.preventDefault();

    let xhr = new XMLHttpRequest();
    xhr.open('GET', `http://localhost/${root}/channel-content/?dislike=${btnDislike.value}&channel_content=${channelContent.value}`, true);
    xhr.send(xhr);

    document.getElementById('count-dislikes').textContent = btnDislike.value;
}