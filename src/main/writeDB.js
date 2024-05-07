
const baseURLFakeStore = "https://fakestoreapi.com/";

const addProductsTofields = async() => {
    const getAllProducts = await axios.get(`${baseURLFakeStore}products`);
    const getFakeStoreProducts = getAllProducts.data;
    console.log(getFakeStoreProducts);
}
const baseURLfakeStoreApi = "https://api.escuelajs.co/api/v1/";

const addProductsfromapi = async() => {
    const getAllProducts = await axios.get(`${baseURLfakeStoreApi}products`);
    const getFakeStoreProducts = getAllProducts.data;
    
}