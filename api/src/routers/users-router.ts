import express from 'express'
import User from '../models/user'
const usersRouter = express.Router()
usersRouter.post('/users', (req, res) => {
    const user: User = req.body
    //TODO: Criar e salvar um novo item
    const id = 123
    res.status(201).location(`/users/${id}`).send()
})
usersRouter.get('/users/:id', (req, res) => {
    const id: number = +req.params.id
    const user: User = {
        id: 1,
        name: 'Matheus',
        phone_number: '49988706208',
        email: "matheus.eu.mv@gmail.com",
        password: ""
    }
    //ex
    //res.status(404).send()
    res.json(user)
})
usersRouter.put('/users/:id', (req, res) => {
    const id: number = +req.params.id
    res.status(204).send()
})
usersRouter.delete('/users/:id', (req, res) => {
    const id: number = +req.params.id
    res.status(204).send()
})
usersRouter.get('/users', (req, res) => {
    const users: User[] = [
        {
            id: 1,
            name: 'Matheus',
            phone_number: '49988706208',
            email: "matheus.eu.mv@gmail.com",
            password: ""
        },
        {
            id: 1,
            name: 'Matheus',
            phone_number: '49988706208',
            email: "matheus.eu.mv@gmail.com",
            password: ""
        }
    ]
    res.json(users)
})
export default usersRouter