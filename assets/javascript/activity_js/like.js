class Like{
    constructor(token, activity_id, route, backgroundColor) {
        this.token = token;
        this.value = 0;
        this.route = route;
        this.activity_id = activity_id;
        this.backgroundColor = backgroundColor;
        this.color = "white";
    }

    likesHandler(){
        const data = new FormData();
        data.append("id", this.activity_id);
        if(this.backgroundColor === "rgba(0, 0, 0, 0)"){
            this.value = 1;
            this.backgroundColor = "rgb(13, 71, 161)";
        }else{
            this.value = -1;
            this.backgroundColor = "rgba(0, 0, 0, 0)";
            this.color = "black";
        }
        data.append("value", this.value);
        return new Request(this.route, {
            method: 'POST',
            body: data,
            credentials: 'same-origin'
        });
    }
}

export default Like;