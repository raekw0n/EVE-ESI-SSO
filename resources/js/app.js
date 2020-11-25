import './bootstrap';


axios.interceptors.request.use((config) => {
    $('#loading').show();
    return config;
});

axios.interceptors.response.use((response) => {
    $('#loading').hide();
    return response;
});


