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
    },async listAll(){
        const res = await fetch("http://localhost:8000/api/categories/")
            .then(response => response.json())
            .then(result => result.data);
            console.log(res);
        return res;
    }
}