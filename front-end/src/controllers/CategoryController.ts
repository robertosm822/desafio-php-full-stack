export default {
    createCategory(name: string): void{
        const myHeaders = new Headers();
        myHeaders.append("Content-Type", "application/json");
    
        const raw = JSON.stringify({
            "name": name,
        });
    
        const requestOptions: any = {
            method: 'POST',
            headers: myHeaders,
            body: raw,
            redirect: 'follow'
        };
    
        fetch("http://localhost:8000/api/categories/", requestOptions)
        .then(response => response.text())
        .then(result => console.log(result))
        .catch(error => console.log('error', error));
    },
    async listAll(){
        const res = await fetch("http://localhost:8000/api/categories/")
            .then(response => response.json())
            .then(result => result.data);
            console.log(res);
        return res;
    },
    getCategoryById(Id: number){
        const requestOptions: any = {
            method: 'GET',
            redirect: 'follow'
        };
        
        const category = fetch("http://localhost:8000/api/categories/"+Id, requestOptions)
        .then(response => response.json())
        .then(result => result.data)
        .catch(error => console.log('error', error));
        return category;
    },
    async updateCategory(Id: number, NameCategory: string){
        const myHeaders = new Headers();
        myHeaders.append("Content-Type", "application/json");

        const raw = JSON.stringify({
            "name": NameCategory
        });

        const requestOptions: any = {
            method: 'PUT',
            headers: myHeaders,
            body: raw,
            redirect: 'follow'
        };

        fetch("http://localhost:8000/api/categories/"+Id, requestOptions)
            .then(response => response.text())
            .then(result => console.log(result))
            .catch(error => console.log('error', error));
    },
    deleteCategory(Id: number){
        const requestOptions: any = {
            method: 'DELETE',
            redirect: 'follow'
        };
          
        fetch("http://127.0.0.1:8000/api/categories/"+Id, requestOptions)
            .then(response => response.text())
            .then(result => console.log(result))
            .catch(error => console.log('error', error));
    }
}