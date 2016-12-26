(function(window, undefined) {
  var dictionary = {
    "e4f2bfa9-ff39-47dd-843b-3a4a9f06572e": "cadastro-coordenadores-1170",
    "2565ccbb-9f9d-4fcd-9f67-ee9b34a37225": "interna-egresso-inicial-1170",
    "c44270ea-2641-4b6b-aed2-35be725d8113": "sucesso-cadastro-1170",
    "da871960-dfe4-43bc-91f4-0b4c10b0a450": "cadastro-egresso-1170",
    "d3296b7b-fc86-44b8-a51d-db064aa577ba": "cadastro-campus-1170",
    "3c3f1841-98dc-4140-870b-8cc6998c0dc1": "view-coordenadores-1170",
    "d43b24fa-8e94-4378-bbb8-e0be6112a53b": "view-campus-1170",
    "165516b8-1cf9-4d26-bdba-566d486bf8a6": "sucesso-esqueci-senha-1170",
    "48ac58c6-6ee5-48b2-9933-825128704a37": "interna-egresso-procurar-amigos-1170",
    "d12245cc-1680-458d-89dd-4f0d7fb22724": "home-1170",
    "9096c490-9a72-4127-957f-b1dad5bb66b4": "sucesso-cadastro-campus-1170",
    "83c5ea80-4d0b-4db3-91fd-60c50cd6896b": "interna-egresso-amigos-1170",
    "6a968220-49e1-48dc-b06a-13643a3461af": "interna-egresso-oportunidades-1170",
    "cbc82032-27de-481b-ae9a-9b5ed90eb812": "esqueci-senha-1170",
    "845639dd-47bd-468b-93ae-4dca617f0ad4": "perfil-coordenadores-1170",
    "8c502210-f9cb-4ada-8f92-26c6b49ed2d3": "home-Admin-1170",
    "b204a159-7992-406f-82da-c5b4eb5c33c3": "1170interna grid - 12 columns",
    "87db3cf7-6bd4-40c3-b29c-45680fb11462": "960 grid - 16 columns",
    "e5f958a4-53ae-426e-8c05-2f7d8e00b762": "960 grid - 12 columns",
    "f39803f7-df02-4169-93eb-7547fb8c961a": "Template 1",
    "9a4f4870-a174-4e5f-80d4-a58134bc7335": "1170 grid - 12 columns",
    "bb8abf58-f55e-472d-af05-a7d1bb0cc014": "default"
  };

  var uriRE = /^(\/#)?(screens|templates|masters|scenarios)\/(.*)(\.html)?/;
  window.lookUpURL = function(fragment) {
    var matches = uriRE.exec(fragment || "") || [],
        folder = matches[2] || "",
        canvas = matches[3] || "",
        name, url;
    if(dictionary.hasOwnProperty(canvas)) { /* search by name */
      url = folder + "/" + canvas;
    }
    return url;
  };

  window.lookUpName = function(fragment) {
    var matches = uriRE.exec(fragment || "") || [],
        folder = matches[2] || "",
        canvas = matches[3] || "",
        name, canvasName;
    if(dictionary.hasOwnProperty(canvas)) { /* search by name */
      canvasName = dictionary[canvas];
    }
    return canvasName;
  };
})(window);