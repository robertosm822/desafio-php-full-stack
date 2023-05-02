export default {
    createProduct(name: string, categoryId: number): void{
        const myHeaders = new Headers();
        myHeaders.append("Content-Type", "application/json");
    
        const raw = JSON.stringify({
            "name": name,
            "category_id": categoryId
        });
    
        const requestOptions: any = {
            method: 'POST',
            headers: myHeaders,
            body: raw,
            redirect: 'follow'
        };
    
        fetch("http://localhost:8000/api/products/", requestOptions)
        .then(response => response.text())
        .then(result => console.log(result))
        .catch(error => console.log('error', error));
    },
    async listAll(){
        const res = await fetch("http://localhost:8000/api/products")
            .then(response => response.json())
            .then(result => result.data.data);
        return res;
    },
    closeDiv(document: any){
        return document.getElementById('msg-send').innerHTML  = ''
    },
    getProductById(Id: number){
        const requestOptions: any = {
            method: 'GET',
            redirect: 'follow'
        };
        
        const product = fetch("http://localhost:8000/api/products/"+Id, requestOptions)
        .then(response => response.json())
        .then(result => result.data)
        .catch(error => console.log('error', error));
        return product;
    },
    async updateProduct(Id: number, NameCategory: string, categoryId: number){
        const myHeaders = new Headers();
        myHeaders.append("Content-Type", "application/json");

        const raw = JSON.stringify({
            "name": NameCategory,
            "category_id": categoryId
        });

        const requestOptions: any = {
            method: 'PUT',
            headers: myHeaders,
            body: raw,
            redirect: 'follow'
        };

        fetch("http://localhost:8000/api/products/"+Id, requestOptions)
            .then(response => response.text())
            .then(result => console.log(result))
            .catch(error => console.log('error', error));
    },
    deleteProduct(Id: number){
        const requestOptions: any = {
            method: 'DELETE',
            redirect: 'follow'
        };
          
        fetch("http://127.0.0.1:8000/api/products/"+Id, requestOptions)
            .then(response => response.text())
            .then(result => console.log(result))
            .catch(error => console.log('error', error));
    }
}