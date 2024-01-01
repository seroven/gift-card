export class TokenManagment {
    static existToken() {
        return localStorage.getItem("token") ? true : false;
    }

    static getPayloadToken() {
        const token = localStorage.getItem("token");
        const tokenPayload = token.split(".")[1];
        const decodedPayload = atob(tokenPayload);
        const payload = JSON.parse(decodedPayload);
        return payload;
    }

    static verifyValidateToken() {
        const payload = TokenManagment.getPayloadToken();
        return Date.now() < payload.exp * 1000;
    }

    static clear() {
        localStorage.removeItem("token");
    }
}
