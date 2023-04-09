import { Request, Response } from 'express';
import { User } from "../entity/User";
import { UserService } from "../services/UserService";
import { IUserController } from './abstractions/IUserController';

const userService = new UserService();

export class UserController implements IUserController {

    async save(request: Request, response: Response) {
        const { name, email } = request.body;

        const user = new User(name, email);

        var savedUser = await userService.save(user);

        response.json(savedUser);
    }

    async getAll(request: Request, response: Response) {

        var allUsers = await userService.getAll();

        response.json(allUsers);
    }

    async getById(request: Request, response: Response) {

        var user = await userService.getById(request.params.id);

        response.json(user);
    }

    async deleteById(request: Request, response: Response) {
        await userService.deleteById(request.params.id);

        response.send().status(204);
    }

    async updateById(request: Request, response: Response) {
        const { name, email } = request.body;

        const user = new User(name, email);

        var userSaved = await userService.updateById(request.params.id, user);

        response.json(userSaved);
    }
}