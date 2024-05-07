
const baseURLFakeStore = "https://fakestoreapi.com/";

const addProductsTofields = async() => {
    const getAllProducts = await axios.get(`${baseURLFakeStore}products`);
    const getFakeStoreProducts = getAllProducts.data;
    console.log(getFakeStoreProducts);
}
const baseURLfakeStoreApi = "https://api.storerestapi.com/";

const addProductsfromapi = async() => {
    const getAllProducts = await axios.get(`${baseURLfakeStoreApi}products`);
    const getFakeStoreProducts = getAllProducts.data;
    console.log(getFakeStoreProducts);
}