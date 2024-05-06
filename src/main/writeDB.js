
const baseURL = "https://fakestoreapi.com/";

const addProductsTofields = async() => {
    const getAllProducts = await axios.get(`${baseURL}products`);
    const getFakeStoreProducts = getAllProducts.data;
    console.log(getFakeStoreProducts);
    const category = document.querySelector('#category')
}