let galleryImg = document.querySelectorAll('.gallery-img');
let getOpenedLatestImg;
let windowWidth = window.innerWidth;

if (galleryImg) {
    galleryImg.forEach(function(images, index) {
        images.onclick = function() {
            let getCssStyling = window.getComputedStyle(images);
            let getFullImgUrl = getCssStyling.getPropertyValue("background-image");
            let getImgUrlPos = getFullImgUrl.split("/images/thumbs/");
            let ImageName = getImgUrlPos[1].replace('")', '');

            getOpenedLatestImg = index + 1;

            let imageWrapper = document.body;
            let imageContainer = document.createElement('div');
            imageWrapper.appendChild(imageContainer);
            imageContainer.setAttribute('class', 'img-container');

            let imageUrl = document.createElement('img');
            imageContainer.appendChild(imageUrl);
            imageUrl.setAttribute('src', '/images/' + ImageName);
            imageUrl.setAttribute('id', 'removeImg');

            let closeContainer = document.createElement('a');
            let closeContText = document.createTextNode('EXIT');
            closeContainer.appendChild(closeContText);
            imageWrapper.appendChild(closeContainer);
            closeContainer.setAttribute('id', 'closeContainer');
            closeContainer.setAttribute('onclick', 'closeImg()');

            imageUrl.onload = function() {
                let imgWidth = this.width;
                let calcImgToEdge = ((windowWidth - imgWidth) / 2) - "110";

                let nextButton = document.createElement('a');
                let nextButtonText = document.createTextNode('Next');
                nextButton.appendChild(nextButtonText);
                imageWrapper.appendChild(nextButton);
                nextButton.setAttribute('class', 'switch_right_button');
                nextButton.setAttribute('id', 'next__Button');
                nextButton.setAttribute('onclick', 'changeImg(1)');
                nextButton.style.cssText = "right: " + calcImgToEdge + "px;";

                let prevButton = document.createElement('a');
                let prevButtonText = document.createTextNode('Prev');
                prevButton.appendChild(prevButtonText);
                imageWrapper.appendChild(prevButton);
                prevButton.setAttribute('class', 'switch_left_button');
                prevButton.setAttribute('id', 'prev__Button');
                prevButton.setAttribute('onclick', 'changeImg(0)');
                prevButton.style.cssText = "left: " + calcImgToEdge + "px;";
            }
        }
    });
}

function closeImg() {
    document.querySelector("#prev__Button").remove();
    document.querySelector("#next__Button").remove();
    document.querySelector("#closeContainer").remove();
    document.querySelector(".img-container").remove();
}

function changeImg(changeDir) {
    document.querySelector("#removeImg").remove();

    let getImgContainer = document.querySelector('.img-container');
    let newImg = document.createElement("img");
    getImgContainer.appendChild(newImg);

    let calcNewImg;

    if (changeDir == 1) {
        calcNewImg = getOpenedLatestImg + 1;
        if (calcNewImg > galleryImg.length) {
            calcNewImg = 1;
        }
    } else if (changeDir == 0) {
        calcNewImg = getOpenedLatestImg - 1;
        if (calcNewImg < 1) {
            calcNewImg = galleryImg.length;
        }
    }

    newImg.setAttribute('src', '/images/gallery' + calcNewImg + ".jpg");
    newImg.setAttribute('id', 'removeImg');

    getOpenedLatestImg = calcNewImg;

    newImg.onload = function() {
        let imgWidth = this.width;
        let calcImgToEdge = ((windowWidth - imgWidth) / 2) - "110";
        let nextButton = document.querySelector('#next__Button');
        let prevButton = document.querySelector('#prev__Button');
        nextButton.style.cssText = "right: " + calcImgToEdge + "px;";
        prevButton.style.cssText = "left: " + calcImgToEdge + "px;";
    }
}
