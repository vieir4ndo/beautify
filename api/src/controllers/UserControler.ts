import { Request, Response } from 'express';
import { User } from "../entities/User";
import { UserService } from "../services/UserService";
import { IUserController } from './abstractions/IUserController';
import * as Validator from 'validatorjs';
import * as bcrypt from 'bcrypt';

const userService = new UserService();

export class UserController implements IUserController {

    async save(request: Request, response: Response) {

        Validator.useLang('pt');

        const validation = new Validator(request.body, {
            name: 'required|min:3|max:150',
            email: 'required|max:256|email|email_available',
            password: 'required|min:8|confirmed',
            phoneNumber: 'required|max:14|phone_number'
        });

        validation.setAttributeNames({
            name: 'nome',
            email: 'e-mail',
            password: 'senha',
            phoneNumber: 'telefone'
        });

        validation.fails(() => {
            response.json(validation.errors.all());
        });

        validation.passes(async () => {
            const { name, email, password, phoneNumber } = request.body;

            bcrypt.hash(password, 10, async (err, hash) => {

                if (err) {
                    response.json({message: 'Erro ao salvar senha do usuário.'})
                }

                const user = new User(name, email, hash, phoneNumber);

                let savedUser = await userService.save(user);

                delete savedUser['password'];
    
                response.json(savedUser);
            });

        });
    }

    async getAll(request: Request, response: Response) {

        let allUsers = await userService.getAll();

        response.json(allUsers);
    }

    async getById(request: Request, response: Response) {

        let user = await userService.getById(parseInt(request.params.id));

        response.json(user);
    }

    async deleteById(request: Request, response: Response) {
        await userService.deleteById(parseInt(request.params.id));

        response.send().status(204);
    }

    async updateById(request: Request, response: Response) {
        const { name, email, password, password2, phoneNumber } = request.body;

        const user = new User(name, email, password, phoneNumber);

        let userSaved = await userService.updateById(parseInt(request.params.id), user);

        response.json(userSaved);
    }
}

Validator.registerAsync('email_available', async function (email, attribute, req, passes) {

    if (await userService.getByEmail(email)) {
        passes(false, 'E-mail já cadastrado.'); // if email is not available
    } else {
        passes(); // if email is available
    }

});

Validator.register('phone_number', function (phone, req, attribute) {
    return phone.length === 14;
}, 'O :attribute não é um número de telefone válido');