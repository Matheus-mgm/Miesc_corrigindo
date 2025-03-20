const inputFile1 = document.querySelector("#picture__input1");
const pictureImage1 = document.querySelector(".picture__image1");
const pictureImageTxt1 = "Escolha uma imagem";

const inputFile2 = document.querySelector("#picture__input2");
const pictureImage2 = document.querySelector(".picture__image2");
const pictureImageTxt2 = "Escolha uma imagem";

const inputFile3 = document.querySelector("#picture__input3");
const pictureImage3 = document.querySelector(".picture__image3");
const pictureImageTxt3 = "Escolha uma imagem";

const inputFile4 = document.querySelector("#picture__input4");
const pictureImage4 = document.querySelector(".picture__image4");
const pictureImageTxt4 = "Escolha uma imagem";

pictureImage1.innerHTML = pictureImageTxt1;
pictureImage2.innerHTML = pictureImageTxt2;
pictureImage3.innerHTML = pictureImageTxt3;
pictureImage4.innerHTML = pictureImageTxt4;

inputFile1.addEventListener("change", function (e) {
    const inputTarget = e.target;
    const file = inputTarget.files[0];

    if (file) {
        const reader = new FileReader();

        reader.addEventListener("load", function (e) {
            const readerTarget = e.target;

            const img = document.createElement("img");
            img.src = readerTarget.result;
            img.classList.add("picture__img");

            pictureImage1.innerHTML = ""; // Limpa o conteúdo anterior
            pictureImage1.appendChild(img);
        });

        reader.readAsDataURL(file);
    } else {
        pictureImage1.innerHTML = pictureImageTxt1;
    }
});

inputFile2.addEventListener("change", function (e) {
    const inputTarget = e.target;
    const file = inputTarget.files[0];

    if (file) {
        const reader = new FileReader();

        reader.addEventListener("load", function (e) {
            const readerTarget = e.target;

            const img = document.createElement("img");
            img.src = readerTarget.result;
            img.classList.add("picture__img");

            pictureImage2.innerHTML = ""; // Limpa o conteúdo anterior
            pictureImage2.appendChild(img);
        });

        reader.readAsDataURL(file);
    } else {
        pictureImage2.innerHTML = pictureImageTxt2;
    }
});

inputFile3.addEventListener("change", function (e) {
  const inputTarget = e.target;
  const file = inputTarget.files[0];

  if (file) {
      const reader = new FileReader();

      reader.addEventListener("load", function (e) {
          const readerTarget = e.target;

          const img = document.createElement("img");
          img.src = readerTarget.result;
          img.classList.add("picture__img");

          pictureImage3.innerHTML = ""; // Limpa o conteúdo anterior
          pictureImage3.appendChild(img);
      });

      reader.readAsDataURL(file);
  } else {
      pictureImage3.innerHTML = pictureImageTxt3;
  }
});

inputFile4.addEventListener("change", function (e) {
  const inputTarget = e.target;
  const file = inputTarget.files[0];

  if (file) {
      const reader = new FileReader();

      reader.addEventListener("load", function (e) {
          const readerTarget = e.target;

          const img = document.createElement("img");
          img.src = readerTarget.result;
          img.classList.add("picture__img");

          pictureImage4.innerHTML = ""; // Limpa o conteúdo anterior
          pictureImage4.appendChild(img);
      });

      reader.readAsDataURL(file);
  } else {
      pictureImage4.innerHTML = pictureImageTxt4;
  }
});