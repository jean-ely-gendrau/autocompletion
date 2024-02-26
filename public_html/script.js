async function postJs({ path, bodyParams }) {
  const req = await fetch(`https://${window.location.hostname}/api/${path}`, {
    method: "POST",
    headers: {
      "Content-Type": "application/w-xxx-form-url-encoded",
    },
    body: Object.entries(bodyParams)
      .map(([key, val], index) => {
        return `${key}=${val}`;
      })
      .join("&"),
  });

  return await req.json();
}

const handelSearch = async (e) => {
  e.preventDefault();
  console.log(e.key, e.target);
  e.target.value = e.target.value + e.key;
};

const picpikSearch = document.getElementById("picpik-search");

if (picpikSearch) {
  picpikSearch.addEventListener("keydown", handelSearch);
}
