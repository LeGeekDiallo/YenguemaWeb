class Sale {
    constructor(id, route) {
        this.route = route;
        this.id = id;
    }

    saleHandle(){
        const data = new FormData();
        data.append("id", this.id);
        return new Request(this.route, {
            method: 'POST',
            body: data,
            credentials: 'same-origin'
        })
    }
}

export default Sale;