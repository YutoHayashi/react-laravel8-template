export type ResponseBody<T = {}> = {
    data: {
        code: number;
        errors: string[];
        messages: string[];
        _embedded: T;
    };
};
export type TokenResource = {
    expires_in: number;
    token: string;
    type: string;
};
