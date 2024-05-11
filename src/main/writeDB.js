
const baseURLfakeStoreApi = "https://api.storerestapi.com/";

const addProductsfromapi = async() => {
    const getAllProducts = await axios.get(`${baseURLfakeStoreApi}categories`);
    const getFakeStoreProducts = getAllProducts.data.data;
    console.log(getFakeStoreProducts);
    
}