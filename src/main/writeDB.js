
const baseURLfakeStoreApi = "https://api.storerestapi.com/";

const addProductsfromapi = async() => {
    const getAllProducts = await axios.get(`${baseURLfakeStoreApi}products`);
    const getFakeStoreProducts = getAllProducts.data.data;
    console.log(getFakeStoreProducts);
    
}