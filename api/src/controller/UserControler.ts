import { Request, Response } from 'express';
import { User } from "../entity/User";
import { UserService } from "../services/UserService";
import { IUserController } from './abstractions/IUserController';

const userService = new UserService();

export class UserController implements IUserController {

    async save(request: Request, response: Response) {
        const { name, email } = request.body;

        const user = new User(name, email);

        let savedUser = await userService.save(user);

        response.json(savedUser);
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
        const { name, email } = request.body;

        const user = new User(name, email);

        let userSaved = await userService.updateById(parseInt(request.params.id), user);

        response.json(userSaved);
    }
}