import { Request, Response } from 'express';
import { User } from "../entities/User";
import { UserService } from "../services/UserService";
import { IUserController } from './abstractions/IUserController';
import * as bcrypt from 'bcrypt';
import CreateUserValidator from './validators/CreateUserValidator';

const userService = new UserService();

export class UserController implements IUserController {

    async save(request: Request, response: Response) {

        const passes = () => {
            const { name, email, password, phoneNumber } = request.body;

            bcrypt.hash(password, 10, async (err, hash) => {

                if (err) {
                    response.json({ message: 'Erro ao salvar senha do usuário.' })
                }

                const user = new User(name, email, hash, phoneNumber);

                let savedUser = await userService.save(user);

                delete savedUser['password'];

                response.status(200).json(savedUser).send();
            });
        }

        const fails = () => {
            return response.status(400).json(validator.getErrors());
        }

        let validator = new CreateUserValidator(request, passes, fails);

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

