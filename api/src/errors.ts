class BaseError extends Error {
    public errors: string;

    constructor(errors: string) {
        super();
        this.errors = errors;
    }
}

class InvalidRequestError extends BaseError { }
class NotFoundError extends BaseError { }

module.exports = { InvalidRequestError, NotFoundError }