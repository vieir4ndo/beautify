import { Request } from 'express';
import { User } from "../entities/User";
import { UserService } from "../services/UserService";
import { IUserController } from './abstractions/IUserController';
import { createUserValidator, deleteUserValidator } from './validators/UserValidator';

const userService = new UserService();

export class UserController implements IUserController {

    async save(request: Request) {
         
        createUserValidator.parse({
             body: request.body,
         });

        const { name, email, password, phoneNumber } = request.body;

        const user = new User(name, email, password, phoneNumber);
        
        return await userService.save(user);
    }

    async getAll(request: Request) {

        let allUsers = await userService.getAll();

        return allUsers;
    }

    async getById(request: Request) {

        let user = await userService.getById(parseInt(request.params.id));

        return user;
    }

    async deleteById(request: Request) {

        deleteUserValidator.parse({
            params: request.params,
        });

        await userService.deleteById(parseInt(request.params.id));
    }

    async updateById(request: Request) {
        const { name, email, password, phoneNumber } = request.body;

        const user = new User(name, email, password, phoneNumber);

        let userSaved = await userService.updateById(parseInt(request.params.id), user);

        return userSaved;
    }
}

