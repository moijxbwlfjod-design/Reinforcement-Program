let products = [];

function addProduct(nom, prix, stock) {
  if (nom && prix > 0 && stock >= 0) {
    products.push({
      id: products.length + 1,
      nom: nom,
      prix: prix,
      stock: stock,
    });
    return true;
  }
  return false;
}

function editProduct(id, nom, prix, stock) {
  if (nom && prix > 0 && stock >= 0) {
    products.forEach((product) => {
      if (product.id == id) {
        product.nom = nom;
        product.prix = prix;
        product.stock = stock;
        return true;
      }
    });
  }
  return false;
}

function removeProduct(id){
  if (id > 0){
    let isFound = false;
    products.forEach((product) => {
      if(product.id === id){
        isFound = true;
        for (let i = id - 1; i < products.length - 2; i++){
          let tmp = products[i];
          products[i] = products[i + 1];
          products[i+1] = tmp;
        }
      }
    })
    if (isFound){
      products.pop();
      return true;
    }
    return false;
  }


function searchByName(nom){
    if(nom){
      products.forEach((product) => {
        if(product.nom === nom) return product;
      })
    }
    return false;
  }

function searchByPrice(minPrice, maxPrice){
    if (minPrice > 0 && maxPrice > minPrice){
      returnedProducts = [];
      products.forEach((product) => {
        if (minPrice <= product.prix && product.prix >= maxPrice){
          returnedProducts.push(product);
        }
      })
      if (returnedProducts.length > 0) return returnedProducts;
      return false;
    }
    return false;
  }

function addQuantity(id, newQuantity){
    if (id > 1 && newQuantity > 0){
      products.forEach((product) => {
        if (product.id === id){
          product.stock += newQuantity;
          return true;
        }
      })
    }
    return false;
  }

function Sell(id, quantity){
    if(id > 0 && quantity > 0){
      products.forEach((product) => {
        if (product.id === id && quantity <= product.stock){
          product.stock -= quantity;
          return true;
        }
      })
    }
    return false;
  }

function stockAlert(critcalStock){
    if (critcalStock >= 0){
      returnedProducts = [];
      products.forEach((product) => {
        if (product.stock === critcalStock) returnedProducts.push(product);
      })
    if (returnedProducts.length > 0) return returnedProducts;
    return false;
    }
  }
