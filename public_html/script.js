async function postJs({ path, bodyParams }) {
  const req = await fetch(`https://${window.location.hostname}/api/${path}`, {
    method: "POST",
    headers: {
      "Content-Type": "application/x-www-form-urlencoded",
    },
    body: Object.entries(bodyParams)
      .map(([key, val], index) => {
        return `${key}=${val}`;
      })
      .join("&"),
  });

  return await req.json();
}

const handelClose = (e) => {
  e.preventDefault();
  console.log(e);
  const picpikContent = document.getElementById("picpik-content");

  if (picpikContent) {
    picpikContent.remove();
  }
};
Array.prototype.sortMatchLength = function (searchValue) {
  const objectNoStartWith = {};
  const objectStartWith = {};

  this.forEach((element) => {
    Object.values(this).forEach((val, index) => {
      //console.log(this[index + 1]);
      /*
      if (
        !val.product_name.toLowerCase().startsWith(searchValue.toLowerCase())
        /* &&
        this[index + 1] &&
        this[index + 1].product_name
          .toLowerCase()
          .startsWith(searchValue.toLowerCase())*/
      //   ) {
      for (let i = 0; i < searchValue.length; i++) {
        if (
          !val.product_name
            .charAt(i)
            .toLowerCase()
            .startsWith(searchValue.charAt(i))
        ) {
          if (!objectNoStartWith.hasOwnProperty(val.code)) {
            Object.assign(objectNoStartWith, { [val.code]: val });
          }
          //console.log(searchValue);
          // On l'extrait du tableau
          //this.splice(index, 1);
          //console.log(this);
          // On change sa position dans le de n + 1
          // this.splice(index + 1, 0, val);
          //console.log(objectNoStartWith);
          break;
        } else if (
          val.product_name
            .charAt(i)
            .toLowerCase()
            .startsWith(searchValue.charAt(i))
        ) {
          if (!objectStartWith.hasOwnProperty(val.code)) {
            Object.assign(objectStartWith, { [val.code]: val });
          }
          //console.log(searchValue);
          // On l'extrait du tableau
          //this.splice(index, 1);
          //console.log(this);
          // On change sa position dans le de n + 1
          // this.splice(index + 1, 0, val);
          //console.log(this);
          break;
        }
      }
      //   }
    });
  });

  Object.values(this).forEach((val, index) => {
    console.log(
      val.product_name.toLowerCase().startsWith(searchValue.toLowerCase())
    );
    if (!val.product_name.toLowerCase().startsWith(searchValue.toLowerCase())) {
      // objectNoStartWith.push(val);
      // On l'extrait du tableau
      //  Object.values(this).splice(index, 1);
    }
  });

  return Object.assign({ start: objectStartWith, end: objectNoStartWith });
};
const handelSearch = async (e) => {
  e.preventDefault();
  //console.log(e.key, e.target);

  const res = await postJs({
    path: "autocomplete.php",
    bodyParams: { action: "search", likeSearch: e.target.value },
  });

  console.log(res);
  const picpikBox = document.getElementById("picpik-box");
  const picpikContent = document.getElementById("picpik-content");
  //const picpikList = document.getElementById("picpik-list");

  const picpikContentElement = document.createElement("div");
  picpikContentElement.setAttribute("id", "picpik-content");
  picpikContentElement.setAttribute(
    "class",
    "absolute min-h-20 top-15 start-0 flex flex-col items-center bg-white text-black w-full rounded-md border-2 border-slate-900"
  );

  /*
  const picpikUlEnd = document.createElement("ul");
  picpikUlEnd.setAttribute("id", "picpik-list-end");
  picpikUlEnd.setAttribute(
    "class",
    "w-full m-auto divide-y divide-gray-200 dark:divide-gray-700 space-y-1"
  );
  */
  const clearButtonElement = document.createElement("button");
  clearButtonElement.setAttribute(
    "class",
    "p-2 my-2 flex justify-center items-center hover:bg-slate-950 justify-self-end bg-slate-800 rounded-md z-1000 text-white capitalize"
  );
  clearButtonElement.setAttribute("id", "buttonClose");

  clearButtonElement.innerHTML = "fermer";
  picpikContentElement.append(clearButtonElement);
  if (Object.keys(res).length > 0) {
    const resSort = Object.values(res).sortMatchLength(e.target.value);
    console.log(resSort);

    Object.entries(resSort).forEach(([key, elements], index) => {
      const picpikUl = document.createElement("ul");
      picpikUl.setAttribute("id", `picpik-list-${key}`);
      picpikUl.setAttribute(
        "class",
        "w-full m-auto divide-y divide-gray-200 dark:divide-gray-700"
      );

      console.log("elements", elements);
      Object.values(elements).forEach((element) => {
        const { nutriscore_grade } = JSON.parse(element.jsonFood);
        //console.log(element);
        const picpikLi = document.createElement("li");
        const linkElement = document.createElement("a");
        linkElement.setAttribute(
          "href",
          `https://${window.location.hostname}/element.php/?id=${element.id}`
        );
        linkElement.setAttribute(
          "class",
          "flex flex-row nowrap items-center justify-between hover:bg-slate-500 text-base font-bold text-slate-950 hover:text-white"
        );
        const imageNutScore = document.createElement("img");
        imageNutScore.setAttribute(
          "class",
          "object-contain w-12 h-10 md:w-20 md:h-18 rounded-md m-2 float-right"
        );
        imageNutScore.setAttribute(
          "src",
          `https://${window.location.hostname}/assets/images/nutri-score-${nutriscore_grade}.svg`
        );
        const imageElement = document.createElement("img");
        const spanElement = document.createElement("span");

        imageElement.setAttribute(
          "src",
          element.src_img.replace("http:", "https:")
        );
        imageElement.setAttribute(
          "class",
          "object-contain w-10 h-10 md:w-18 md:h-18 rounded-md m-2"
        );

        spanElement.textContent = element?.product_name;
        spanElement.setAttribute("class", "w-2/4 px-5");
        linkElement.append(spanElement, imageNutScore, imageElement);
        picpikLi.append(linkElement);
        picpikUl.append(picpikLi);
      });

      const picpikHR = document.createElement("hr");
      picpikHR.setAttribute(
        "class",
        "w-full h-1 mx-auto my-2 bg-gray-100 border-0 md:my-4 dark:bg-gray-700"
      );

      picpikContentElement.append(picpikUl, picpikHR);
    });
    /*
    resSort.end.forEach((element) => {
      //console.log(element);
      const picpikLi = document.createElement("li");
      picpikLi.setAttribute(
        "class",
        "flex flex-row nowrap items-center justify-between"
      );

      const imageElement = document.createElement("img");
      const spanElement = document.createElement("span");

      imageElement.setAttribute(
        "src",
        element.src_img.replace("http:", "https:")
      );
      imageElement.setAttribute(
        "class",
        "object-contain w-10 h-10 md:w-18 md:h-18 rounded-md m-2"
      );

      spanElement.textContent = element?.product_name;
      spanElement.setAttribute(
        "class",
        "w-2/3 text-base font-bold text-slate-950"
      );

      picpikLi.append(spanElement, imageElement);
      picpikUlEnd.append(picpikLi);
    });
    */
  }

  // console.log(picpikUl);

  picpikContent
    ? picpikContent.replaceWith(picpikContentElement)
    : picpikBox.append(picpikContentElement);

  const buttonClose = document.getElementById("buttonClose");
  if (buttonClose) {
    console.log(buttonClose);

    buttonClose.addEventListener("click", handelClose);
  }
  if (picpikContent === null) {
    /*
      const clearButtonElement = document.createElement("button");
      clearButtonElement.setAttribute(
        "class",
        "static w-10 h-10 top-15 start-0 flex items-center ps-3 pointer-events-none bg-slate-900 rounded-md z-20"
        );
        
        clearButtonElement.innerHTML =
      "<svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke-width='1.5' stroke='currentColor' class='w-10 h-10 z-20'><path stroke-linecap='round' stroke-linejoin='round' d='m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z' /></svg>";
*/
  }
  /*
  if (picpikList) {
    picpikList.prepend(picpikLi);
  }
  */
  // e.stopPropagation();
};

const picpikSearch = document.getElementById("picpik-search");

if (picpikSearch) {
  picpikSearch.addEventListener("input", handelSearch);
  picpikSearch.addEventListener("focusout", function (e) {
    e.stopPropagation();
  });
}
