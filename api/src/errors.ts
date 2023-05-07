class BaseError {
    public errors: any;

    constructor(errors: any = null) {
        this.errors = errors
    }
}
export class NotFoundError extends BaseError{ }
export class InvalidRequestError extends BaseError{ }
