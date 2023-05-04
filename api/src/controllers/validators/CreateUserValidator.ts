import { Request } from 'express';
import * as Validator from 'validatorjs';

class CreateUserValidator {

    private validation: Validator;

    constructor(request: Request, passes: Function, fails: Function) {
        this.validation = new Validator(request.body, {
            name: 'required|min:3|max:150',
            email: 'required|max:256|email|email_available',
            password: 'required|min:8|confirmed',
            phoneNumber: 'required|max:14|phone_number'
        });

        this.validation.setAttributeNames({
            name: 'nome',
            email: 'e-mail',
            password: 'senha',
            phoneNumber: 'telefone'
        });

        this.validation.passes(passes);

        this.validation.fails(fails);
    }

    public getErrors(): string {
        return this.validation.errors.all();
    }
}

export default CreateUserValidator;